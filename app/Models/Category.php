<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable =['name','description'];

    //relacionamento uma categoria pode ter n produtos

    function products()
    {
        return $this->hasMany(Product::class,'cod_category','cod_category');
    }

}
