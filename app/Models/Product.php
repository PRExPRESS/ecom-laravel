<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'category_id', 'brand_id', 'image', 
        'colors', 'sizes', 'description', 'price', 'stock', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
