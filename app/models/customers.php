<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = "customers";

    protected $fillable = [
        'id','nit','name', 'address', 'phone_number'
    ];

    public function debts(){
        return $this->hasMany('App\models\debts');
    }

    public function movements(){
        return $this->hasMany('App\models\movements');
    }
}
