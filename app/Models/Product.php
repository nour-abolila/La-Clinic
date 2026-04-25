<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'image', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
