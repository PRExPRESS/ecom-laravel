<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Brand 1',
        ]);
        Brand::create([
            'name' => 'Brand 2',
        ]);
        Brand::create([
            'name' => 'Brand 3',
        ]);
    }
}
