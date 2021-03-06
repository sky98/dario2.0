<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
    	$user = User::where([ 'email' => $request->email ])->first();
    	if(!$user){
    		return response(
    			[
    				'error' => 'Wrong credentials'
    			],
    			Response::HTTP_BAD_REQUEST
    		);
    	}
    	if( password_verify($request->password , $user->password) ){
            if($user->state == 1){
                return response(
                    $user,Response::HTTP_OK
                );
            }
    		return response([
                'error' => 'Disabled user'
                ],Response::HTTP_BAD_REQUEST
            );
    	}
    	return response([
    		'error' => 'Wrong credentials'
    		],Response::HTTP_BAD_REQUEST
    	);
    }
}
