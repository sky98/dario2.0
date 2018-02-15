<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\models\debts;
use App\models\movements;
use App\User;
use App\models\customers;

class EmployeeController extends Controller
{
    public function new(){
		if (User::where('nit',$request->input('nit'))->get()->first() == null) {
            $user = new User();
            $data = $request->all();
            $user->create($data);
            return response()->json([],201);
        }
        else{
            return response()->json([
            	'error' => 'Invalid identification number'
            ],Response::HTTP_BAD_REQUEST);  
        }
	}

	public function all(){
    	$employees = User::where('role','e')->get();
    	if(!$employees){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$employees,Response::HTTP_OK
    		);
    	}
    }

    public function employeeDetails($id){
    	$employeeDetails = User::where('user.id',$id)
    						->join('movements','user.id','=','movements.customer_id')
    						->select('user.*','movements.value','movements.type','movements.customer_id')->get();
    	if(!$employeeDetails){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$employeeDetails,Response::HTTP_OK
    		);
    	}
    }

    public function changeState(Request $request){
    	$employee = User::find($request->input('id'));
    	if(!$employee){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		if($request->input('id') == 1){
	    		$employee->state = 1 ;
	    	}
	    	else{
	    		$employee->state = 0 ;
	    	}
	    	$employee->save();
	    	return response()->json([],200);	
    	}    	
    }

    public function updateName(Request $request){
    	try{    		
	        $employee = User::find($request->input('id'));
	        if(!$employee){
	    		return response(
	    			[
	    				'error' => 'No records'
	    			],
	    			Response::HTTP_BAD_REQUEST
	    		);
	    	}
	    	else{
	    		$employee->name = $request->input('name');
	        	$employee->save();
	    		return response()->json([],200);
	    	}	 
    	}
    	catch(Exception $e){
    		return response()->json([
    			'error' => 'Error trying to update'
    		],500);
    	}
    }

    public function updateEmail(Request $request){
    	try {
            $employee = User::find($request->input('id')); 
            if(!$employee){
	    		return response(
	    			[
	    				'error' => 'No records'
	    			],
	    			Response::HTTP_BAD_REQUEST
	    		);
	    	}
	    	else{
	    		$employee->email = $request->input('email');
	        	$employee->save();
	    		return response()->json([],200);
	    	}	
        } 
        catch (Exception $e) {
            return response()->json([
    			'error' => 'Error trying to update'
    		],500); 	
        }      
    }

    public function updatePassword(Request $request){

    	try {
    		$employee = User::find($request->input('id'));
    		if(!$employee){
	    		return response(
	    			[
	    				'error' => 'No records'
	    			],
	    			Response::HTTP_BAD_REQUEST
	    		);
	    	}
	    	else{
	    		if($request->input('password1') == $request->input('password2')){
	                $employee->password = bcrypt($request->input('password1'));
	                $employee->save();
	               return response()->json([],200);
	         }
	        else{
	            return response(
	    			[
	    				'error' => 'password do not match'
	    			],
	    			Response::HTTP_BAD_REQUEST
	    		);
	        }
	    	}
    	} 
    	catch (Exception $e) {
    		return response()->json([
    			'error' => 'Error trying to update'
    		],500);
    	}        
    }

    public function search($id){
    	$employee = User::find($id);
    	if(!$employee){
    		return response(
    			[
    				'error' => 'No records'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	else{
    		return response(
    			$employee,Response::HTTP_OK
    		);
    	}
    }
}
