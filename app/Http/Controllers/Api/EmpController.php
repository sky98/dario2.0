<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\models\customers;
use App\models\debts;
use App\models\movements;

class EmpController extends Controller
{
    public function customerList(){
    	$customers = Customers::all();
    	if(!$customers){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$customers,Response::HTTP_OK
    		);
    	}
    }

    public function customerDetails($id){
    	$customerDetails = customers::where('customers.id',$id)
    						->join('debts','customers.id','=','debts.customer_id')
    						->select('customers.*','debts.initial_balance','debts.current_balance')->get();
    	if(!$customerDetails){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$customerDetails,Response::HTTP_OK
    		);
    	}
    }

    public function customerMovements($id){
    	$movements = movements::where('customer_id',$id)->get();
    	if(!$movements){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$movements,Response::HTTP_OK
    		);
    	}
    }

    public function lend(Request $request){
    	
    }
}
