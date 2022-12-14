<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;


    protected $table = 'product_images';

    protected $fillable = ['product_id ', 'images'];

    public function product_images()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
