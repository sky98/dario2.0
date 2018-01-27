<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function login(){
    	//dd(Auth::check());
		if(Auth::check()){
			//dd(Auth::user()->role);
			switch (Auth::user()->role) {
				case 'a':return redirect()->action('AdministratorController@main');
					break;
				case 'e':return redirect()->action('EmployeeController@main');
					break;
				case 's':return redirect()->action('SupervisorController@main');
					break;
			}
		}
		else{
			return view('login');
		}
	}

    public function validations(Request $request){
        $credentials = ['nit'=>$request->input('nit'),
                'password'=>$request->input('password'),
                'state' => true
        ];
        if(Auth::attempt($credentials)){
        	switch (Auth::user()->role) {
        		case 'a':return redirect()->action('AdministratorController@main');
        			break;
        		case 'e':return redirect()->action('EmployeeController@main');
        			break;
        		case 's':return redirect()->action('SupervisorController@main');
        			break;
        	}
        }
        else{
            return view('login');
        }
    }

    public function sessionOut(){
        Auth::logout();
        return redirect()->action('LoginController@login');
    }
}
