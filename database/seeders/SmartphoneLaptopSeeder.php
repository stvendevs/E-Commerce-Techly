<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class SmartphoneLaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storeId = \App\Models\Store::first()->id;

        // Create Smartphone product
        $smartphone = Product::create([
            'store_id' => $storeId,
            'product_category_id' => 1, // Smartphone
            'name' => 'iPhone 15 Pro Max',
            'slug' => 'iphone-15-pro-max',
            'description' => 'iPhone 15 Pro Max dengan chip A17 Pro, layar Super Retina XDR 6.7 inci, dan sistem kamera pro terbaik. Titanium design yang premium dan ringan.',
            'condition' => 'new',
            'price' => 21999000,
            'weight' => 221,
            'stock' => 50,
        ]);

        // Add image for smartphone
        ProductImage::create([
            'product_id' => $smartphone->id,
            'image' => 'uploads/products/iphone-15-pro-max.jpg',
            'is_thumbnail' => true,
        ]);

        // Create Laptop product
        $laptop = Product::create([
            'store_id' => $storeId,
            'product_category_id' => 2, // Laptop
            'name' => 'MacBook Pro M3 14 inch',
            'slug' => 'macbook-pro-m3-14-inch',
            'description' => 'MacBook Pro dengan chip M3 Pro, layar Liquid Retina XDR 14 inci, RAM 18GB, SSD 512GB. Performa luar biasa untuk profesional kreatif.',
            'condition' => 'new',
            'price' => 32999000,
            'weight' => 1600,
            'stock' => 30,
        ]);

        // Add image for laptop
        ProductImage::create([
            'product_id' => $laptop->id,
            'image' => 'uploads/products/macbook-pro-m3.jpg',
            'is_thumbnail' => true,
        ]);

        echo "Smartphone and Laptop products created successfully!\n";
    }
}
