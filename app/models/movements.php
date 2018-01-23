<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class movements extends Model
{
    protected $table = "movements";
    
    protected $fillable = [
        'id','type','value','percentage','user_id','customer_id'
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function customers(){
    	return $this->belongsTo('App\models\customers');
    }
}
