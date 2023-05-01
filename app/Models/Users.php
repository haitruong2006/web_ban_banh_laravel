<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;

class Users extends Model
{
    use HasFactory;
    protected $table="users";
    protected $fillable=['full_name', 'email', 'password', 'phone', 'address'];

    public function bill(){
        return $this->hasMany(Bill::class,'id_customer','id');
    }
}
