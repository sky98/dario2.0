<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\customers;

class EmpController extends Controller
{
    public function customerList(){
    	$customers = Customers::all();
    	return $customers;
    }
}
