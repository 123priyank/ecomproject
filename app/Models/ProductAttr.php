<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    use HasFactory;

    protected $table = 'products_attr';
    protected $fillable = ['product_id ', 'attr_image', 'sku', 'mrp', 'price', 'qty', 'size_id', 'color_id'];


//    public function colors()
//    {
//        return $this->belongsTo(Color::class,'color_id','id');
//    }


}

