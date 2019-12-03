<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','picture','price'];

    //um produto pertence a uma categoria
    function category()
    {
        return $this->belongsTo(Category::class,'cod_category','cod_product');
    }
}
