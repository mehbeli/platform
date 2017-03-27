<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
