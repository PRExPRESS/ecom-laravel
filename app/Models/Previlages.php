<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Previlages extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'add_product', 'edit_product', 'delete_product',
        'add_category', 'edit_category', 'delete_category',
        'add_brand', 'edit_brand', 'delete_brand',
        'add_color', 'edit_color', 'delete_color',
        'add_size', 'edit_size', 'delete_size',
        'add_order', 'edit_order', 'delete_order',
        'edit_user', 'delete_user', 'add_user',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
