<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\debts;
use App\models\movements;
use App\models\customers;

class CustomerController extends Controller
{

	public function new(){
		if (customers::where('nit',$request->input('nit'))->get()->first() == null) {
            $customer = new customers();
            $data = $request->all();
            $customer->create($data);
            return response()->json([],201);
        }
        else{
            return response()->json([}
            	'error' => 'Invalid identification number'
            ],Response::HTTP_BAD_REQUEST);  
        }
	}

    public function all(){
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
    	if (debts::where('customer_id',$request->input('customer_id'))->get()->first() == null) {
            $debts = Debts::create([
                'initial_balance' => $request->input('value'),
                'current_balance' => $request->input('initial_balance'),
                'customer_id' => $request->input('customer_id'),
            ]);                      
        }else{
            $debts = debts::where('customer_id',$request->input('customer_id'))->get()->first();
            $debts->current_balance = $debts->current_balance + $request->input('initial_balance');
            $debts->save();
        }
        $movements = movements::create([
            'type' => 0,
            'value' => $request->input('value'),
            'percentage' => $request->input('percentage'),
            'user_id' => $request->input('user_id'),
            'customer_id' => $request->input('customer_id'),
        ]);
        return response()->json([], 201);
    }

    public function pay(Request $request){
    	$debts = Debts::where('customer_id',$request->input('customer_id'))->get()->first();
        $debts->current_balance = $debts->current_balance - $request->input('value');
        $debts->save();
        $movements = Movements::create([
            'type' => 1,
            'value' => $request->input('value'),
            'percentage' => 0,
            'user_id' => $request->input('user_id'),
            'customer_id' => $request->input('customer_id'),
        ]);
        return response()->json([], 201);
    }

    public function search($id){
    	$customer = Customers::find($id);
    	if(!$customer){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$customer,Response::HTTP_OK
    		);
    	}
    }
}
