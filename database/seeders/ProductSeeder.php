<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed 10 products
        Product::create([
            'name' => 'Basic Red T-shirt',
            'slug' => 'basic-red-t-shirt',
            'category_id' => 1,  // T-shirt
            'brand_id' => 1,     // Brand A
            'image' => 'images/products/basic-red-t-shirt.jpg',
            'colors' => 'Red',
            'sizes' => 'S, M, L',
            'description' => 'A basic red T-shirt for everyday wear.',
            'price' => 1900.99,
            'stock' => 150,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Classic Blue T-shirt',
            'slug' => 'classic-blue-t-shirt',
            'category_id' => 1,  // T-shirt
            'brand_id' => 2,     // Brand B
            'image' => 'images/products/classic-blue-t-shirt.jpg',
            'colors' => 'Blue',
            'sizes' => 'M, L, XL',
            'description' => 'A classic blue T-shirt that never goes out of style.',
            'price' => 2200.99,
            'stock' => 200,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Slim Fit Trouser',
            'slug' => 'slim-fit-trouser',
            'category_id' => 2,  // Trouser
            'brand_id' => 3,     // Brand C
            'image' => 'images/products/slim-fit-trouser.jpg',
            'colors' => 'Black',
            'sizes' => '30, 32, 34, 36',
            'description' => 'Slim-fit trousers with a modern cut.',
            'price' => 4900.99,
            'stock' => 120,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Casual Grey Trouser',
            'slug' => 'casual-grey-trouser',
            'category_id' => 2,  // Trouser
            'brand_id' => 1,     // Brand A
            'image' => 'images/products/casual-grey-trouser.jpg',
            'colors' => 'Grey',
            'sizes' => '32, 34, 36',
            'description' => 'Casual grey trousers for a comfortable fit.',
            'price' => 5539.99,
            'stock' => 180,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Sporty Black T-shirt',
            'slug' => 'sporty-black-t-shirt',
            'category_id' => 1,  // T-shirt
            'brand_id' => 2,     // Brand B
            'image' => 'images/products/sporty-black-t-shirt.jpg',
            'colors' => 'Black',
            'sizes' => 'S, M, L',
            'description' => 'A sporty black T-shirt for an active lifestyle.',
            'price' => 1125.99,
            'stock' => 220,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'White Casual Top',
            'slug' => 'white-casual-top',
            'category_id' => 3,  // Top
            'brand_id' => 3,     // Brand C
            'image' => 'images/products/white-casual-top.jpg',
            'colors' => 'White',
            'sizes' => 'M, L',
            'description' => 'A simple and stylish white top for casual wear.',
            'price' => 1329.99,
            'stock' => 160,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Stylish Blue Top',
            'slug' => 'stylish-blue-top',
            'category_id' => 3,  // Top
            'brand_id' => 1,     // Brand A
            'image' => 'images/products/stylish-blue-top.jpg',
            'colors' => 'Blue',
            'sizes' => 'S, M, L, XL',
            'description' => 'A stylish blue top for both casual and formal wear.',
            'price' => 1234.99,
            'stock' => 140,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Elegant Red Top',
            'slug' => 'elegant-red-top',
            'category_id' => 3,  // Top
            'brand_id' => 2,     // Brand B
            'image' => 'images/products/elegant-red-top.jpg',
            'colors' => 'Red',
            'sizes' => 'M, L',
            'description' => 'An elegant red top perfect for evening wear.',
            'price' => 739.99,
            'stock' => 110,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Black Leather Jacket',
            'slug' => 'black-leather-jacket',
            'category_id' => 3,  // Top
            'brand_id' => 3,     // Brand C
            'image' => 'images/products/black-leather-jacket.jpg',
            'colors' => 'Black',
            'sizes' => 'M, L, XL',
            'description' => 'A premium black leather jacket for a bold look.',
            'price' => 1199.99,
            'stock' => 80,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Summer Green T-shirt',
            'slug' => 'summer-green-t-shirt',
            'category_id' => 1,  // T-shirt
            'brand_id' => 2,     // Brand B
            'image' => 'images/products/summer-green-t-shirt.jpg',
            'colors' => 'Green',
            'sizes' => 'S, M, L',
            'description' => 'A light and breathable green T-shirt for the summer.',
            'price' => 1899.00,
            'stock' => 250,
            'status' => 'available',
        ]);
    }
}
