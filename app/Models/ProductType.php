<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class ProductType extends Model
{
    use HasFactory;

    protected $table='type_products';
    public function product(){
        return $this->hasMany(Products::class,'id_type','id');
    }
}
