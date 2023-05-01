<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Bill_detail;
class Bill extends Model
{
    use HasFactory;
    protected $table="bills";
    protected $fillable=['id_customer', 'total', 'payment'];

    public function users(){
        return $this->belongsTo(Users::class,'id_customer','id');
    }

    public function bill_detail(){
        return $this->hasMany(Bill_detail::class,'id_bill','id');
    }

}
