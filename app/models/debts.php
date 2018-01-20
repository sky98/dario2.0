<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class debts extends Model
{
    protected $table = "debts";
    
    protected $fillable = [
        'id','initial_balance','current_balance', 'customer_id'
    ];

    public function customers(){
    	return $this->belongsTo('App\models\customers');
    }
    
}
