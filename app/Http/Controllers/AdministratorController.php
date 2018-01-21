<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\movements;

class AdministratorController extends Controller
{
    public function main(){
    	$users = User::simplePaginate(5);
    	return view('administrator.main',compact('users'));
    }

    public function employees(){
    	$query = new User();
    	$employees = $query->employees()->simplePaginate(3);
    	return view('administrator.employees',compact('employees'));
    }

    public function employeeInformation($id){
    	$employee = User::find($id);
    	return view('administrator.employeeInformation',compact('employee'));
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

    public function employeeMovements($id){
    	$movements = movements::distinct()->select('created_at')->where('user_id',$id)->groupby('created_at')->get();
    	dd($movements);
    	//return view('administrator.employeeMovements',compact('movements'));
    }
}
