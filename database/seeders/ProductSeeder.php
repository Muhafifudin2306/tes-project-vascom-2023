<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_image' => 'parfum_1.png',
                'product_name' => 'Euodia',
                'product_price' => 500000.00,
                'note' => 'Deskripsi produk 1',
            ],
            [
                'product_image' => 'parfum_2.png',
                'product_name' => 'Euodia',
                'product_price' => 500000.00,
                'note' => 'Deskripsi produk 2',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
