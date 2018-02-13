<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
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
            return response()->json([}
            	'error' => 'Invalid identification number'
            ],Response::HTTP_BAD_REQUEST);  
        }
	}

	public function all(){
    	$employees = User::all();
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

    public function changeState($id,$state){
    	$employee = User::find($id);
    	if($state == 1){
    		$employee->state = 1 ;
    	}
    	else{
    		$employee->state = 0 ;
    	}
    	$employee->save();
    	return response()->json([],200);
    }

    public function updateName($id,$name){
        $user = User::find($id);
        $user->name = $name;
        $user->save();
        return response()->json([],200);
    }

    public function updateEmail($id,$email){
        if(User::where('email',$email)->get()->first() == null){
            $user = User::find($id);
            $user->email = $email;
            $user->save();
            return response()->json([],200);
        }  
        return response(
    			[
    				'error' => 'Mail in use'
    			],
    			Response::HTTP_BAD_REQUEST
    		);      
    }

    public function updatePassword(Request $request){
        $credentials = ['id'=>$request->input('user_id'),
                        'password'=>$request->input('password1')
                        ];
        if($request->input('password1') == $request->input('password2')){
                $user = Auth::user();
                $user->password = bcrypt($request->input('password1'));
                $user->save();
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
