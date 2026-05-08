<?php

namespace App\Console\Commands;

use App\Services\MoySkladService;
use Illuminate\Console\Command;

class SyncMoySklad extends Command
{
    protected $signature = 'moysklad:sync';
    protected $description = 'Sync products and stocks from MoySklad';

    public function handle(MoySkladService $service)
    {
        $this->info('Syncing products...');
        $count = $service->syncProducts();
        $this->info("Synced {$count} products");

        $this->info('Syncing stocks...');
        $count = $service->syncStocks();
        $this->info("Synced {$count} stocks");

        $this->info('Done!');
    }
}
