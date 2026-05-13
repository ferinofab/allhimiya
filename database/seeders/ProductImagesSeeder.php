<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Данные из product_images.sql
        $images = [
            // product_id, image_path, is_main
            [1, '/storage/products/1/JifHbuJuDJFLz6zmcHhtzm59LTvbRxyOhxMBbZrD.webp', 1],
            [1, '/storage/products/1/BN7CW7cp02YUbbkpMmOkvfEawCy5qabhKxTxVjYj.png', 0],
            [67, '/storage/products/67/5JxEiDYeOqnKmb7KoaTXuxlHObErOGsi4LDjVwRm.jpg', 1],
            [12, '/storage/products/12/vbGAfFpalnsF1rMtV8qBkuJ0vLUP8jdnOLx3mn3k.jpg', 1],
            [6, '/storage/products/6/0LZVx7cZ4oc7skgGJZOpsHZ3tUhS1XTNOCmsoGSK.jpg', 1],
            [8, '/storage/products/8/vZJGesmkdQ1NWxhFLLD5YZjdvsnvRmu5X5lvwpHU.jpg', 1],
            [10, '/storage/products/10/Og7PFSdOGOGKdlR6ah8YTrc1f6Vbce2caUtphBgK.jpg', 1],
            [7, '/storage/products/7/eylHaQZFc9ja6vEWCUnYA4c2xalUs59riC34nszd.jpg', 1],
        ];

        foreach ($images as $imageData) {
            [$productId, $imagePath, $isMain] = $imageData;

            // Проверяем, существует ли товар
            $product = Product::find($productId);

            if ($product) {
                // Обновляем или создаём изображение
                ProductImage::updateOrCreate(
                    [
                        'product_id' => $productId,
                        'image_path' => $imagePath,
                    ],
                    [
                        'is_main' => $isMain,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                $this->command->info("Добавлено изображение для товара ID: {$productId}");
            } else {
                $this->command->warn("Товар с ID {$productId} не найден, изображение пропущено");
            }
        }

        $this->command->info('Загрузка изображений завершена!');
    }
}
