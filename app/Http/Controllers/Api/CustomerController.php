<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\debts;
use App\models\movements;

class CustomerController extends Controller
{
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
    	$this->validate($request,[
    		'value' => 'required',
    		'percentage' => 'required',
    		'user_id' => 'required',
    		'customer_id' => 'required'
    	]);

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
        return redirect()->action('EmployeeController@customer',$request->input('customer_id'));
    }
}
