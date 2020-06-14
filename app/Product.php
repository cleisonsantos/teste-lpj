<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function category()
    {
        # Metodo de relacionamento de produtos com categorias
        return $this->hasMany(Category::class, 'category', 'id');
    }
}
