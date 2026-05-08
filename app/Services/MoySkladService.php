<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MoySkladService
{
    protected $login;
    protected $password;
    protected $apiUrl = 'https://api.moysklad.ru/api/remap/1.2/';

    public function __construct()
    {
        $this->login = env('MOYSKLAD_LOGIN');
        $this->password = env('MOYSKLAD_PASSWORD');
    }

    public function syncProducts()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->login . ':' . $this->password),
            'Accept-Encoding' => 'gzip',
            'Content-Type' => 'application/json',
        ])->withOptions([
            'verify' => false,
            'decode_content' => true,
        ])->get($this->apiUrl . 'entity/product', [
            'limit' => 100,
        ]);

        if (!$response->successful()) {
            Log::error('MoySklad API error: ' . $response->status());
            return 0;
        }

        $products = $response->json()['rows'] ?? [];
        $count = 0;

        foreach ($products as $item) {
            $price = ($item['salePrices'][0]['value'] ?? 0) / 100;

            Product::updateOrCreate(
                ['moysklad_id' => $item['id']],
                [
                    'name' => $item['name'],
                    'sku' => $item['code'] ?? null,
                    'price' => $price,
                    'description' => $item['description'] ?? '',
                ]
            );
            $count++;
        }

        Log::info('Synced ' . $count . ' products');
        return $count;
    }

    public function syncStocks()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->login . ':' . $this->password),
            'Accept-Encoding' => 'gzip',
        ])->withOptions([
            'verify' => false,
            'decode_content' => true,
        ])->get($this->apiUrl . 'report/stock/bystore', [
            'limit' => 100,
        ]);

        if (!$response->successful()) {
            Log::error('MoySklad stocks error: ' . $response->status());
            return 0;
        }

        $rows = $response->json()['rows'] ?? [];
        $count = 0;

        foreach ($rows as $row) {
            $href = $row['meta']['href'] ?? '';
            $moyskladId = null;

            if ($href) {
                $cleanHref = explode('?', $href)[0];
                $parts = explode('/', $cleanHref);
                $moyskladId = end($parts);
            }

            $stock = $row['stockByStore'][0]['stock'] ?? 0;

            if ($moyskladId) {
                Product::where('moysklad_id', $moyskladId)->update(['amount' => $stock]);
                $count++;
            }
        }

        Log::info('Synced ' . $count . ' stocks');
        return $count;
    }

    public function updateStocs($request, $product)
    {
        $currentStocs = $product->amount;

    }
}
