<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'image', 'slug', 'brand', 'model', 'short_desc', 'desc', 'keywords', 'technical_specification', 'uses', 'warranty', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productAttr()
    {
        return $this->hasMany(ProductAttr::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(Product_image::class, 'product_id');
    }
}

