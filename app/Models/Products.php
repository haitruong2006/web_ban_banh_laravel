<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill_detail;
use App\Models\ProductType;

class Products extends Model
{
    use HasFactory;

    public function bill_detail(){
        return $this->hasMany(Bill_detail::class,'id_product','id');
    }

    public function product_type(){
        return $this->belongsTo(ProductType::class,'id_type','id');
    }
}
