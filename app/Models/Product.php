<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'productName',
        'description',
        'off',
        'listPrice',
        'ourPrice',
        'productImage',
        'featured',
        'category_id',
        'starRating',
        // 'subcategory_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // public function subcategory()
    // {
    //     return $this->belongsTo(Subcategory::class);
    // }
}