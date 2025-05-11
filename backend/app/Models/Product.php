<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'status',
    ];

    public function category()
    {
        // Define the inverse one-to-many relationship to Category
        return $this->belongsTo(Category::class);
    }
}
