<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class SupervisorController extends Controller
{
    public function main(){
    	$users = User::orderBy('name','ASC')->simplePaginate(5);
    	return view('supervisor.main',compact('users'));
    }

    public function search(Request $request){
        $user = User::where('nit',$request->input('user_id'))->get()->first();
        if($user == null){
            return redirect()->action('SupervisorController@main');
        }
        else{
            return view('supervisor.search',compact('user'));
        }
    }

    public function user($id){
    	$user = User::find($id);
    	return view('supervisor.user',compact('user'));
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
    	return 1;
    }

    public function newUser(Request $request){
    	if(User::where('nit',$request->input('nit'))->get()->first() == null){
            if(User::where('email',$request->input('email'))->get()->first() == null){
                $password = bcrypt(substr($request->input('nit'),0,5).ucwords(substr($request->input('name'),0,1)));
                $user = User::create([
                    'nit' => $request->input('nit'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'state' => 1,
                    'role' => 'a',
                    'password' => $password,
                    'token' => $request->input('token'),
                ]);
                return redirect()->back()->with('alert','Usuario Creado con Exito');
            } 
            else{
                return redirect()->back()->with('alert','Correo ya existe en la base de datos.'); 
            }               
        }
        else{
            return redirect()->back()->with('alert','Numero de Identificacion no valido'); 
        }
    }

    public function register(){
    	return view('supervisor.register');
    }

    public function personal(){
        return view('supervisor.personal');
    }

    public function updateNit($id,$nit){
        $control = 0;
        if(User::where('nit',$nit)->get()->first() == null){
            $user = User::find($id);
            $user->nit = $nit;
            $user->save();
            $control = 1;
        }
        return $control;
    }

    public function updateName($id,$name){
        $user = User::find($id);
        $user->name = $name;
        $user->save();
        return 1;
    }

    public function updateEmail($id,$email){
        $control = 0;
        if(User::where('email',$email)->get()->first() == null){
            $user = User::find($id);
            $user->email = $email;
            $user->save();
            $control = 1;
        }        
        return $control;
    }

    public function updatePassword(Request $request){
        $credentials = ['id'=>$request->input('user_id'),
                        'password'=>$request->input('oldPassword')
                        ];
        if(Auth::attempt($credentials)){
            if($request->input('newPassword') == $request->input('newPassword2')){
                $user = Auth::user();
                $user->password = bcrypt($request->input('newPassword'));
                $user->save();
                return redirect()->back()->with('alert','Se ha Modificado Su contraseña...');
            }
            else{
                return redirect()->back()->with('alert','La nueva Contraseña no coincide...');
            }
        }
        else{
            return redirect()->back()->with('alert','Su contraseña actual no coincide');
        }
    }

}
