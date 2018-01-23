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
        $employeeMovements = [];
    	$movements = movements::distinct()->select('created_at')->where('user_id',$id)->groupby('created_at')->get();
        foreach ($movements as $movement) {
            $array[] = $movement->created_at->format('Y-m-d');
        }
        $days = array_unique($array);
        foreach ($days as $day) {
            $raise = movements::whereDate('created_at',$day)->where('user_id',$id)->where('type',1)->sum('value');
            $pay = movements::whereDate('created_at',$day)->where('user_id',$id)->where('type',0)->sum('value');
            dd($pay);
            //array_add($employeeMovements,['day' => $day,'received' => $raise,'loaned' => $pay]);
        }
        //dd($employeeMovements);
        //dd($movements[1]->created_at->format('Y-m-d'));   
        //dd(movements::getCreated_at($movements->get('1')));
    	//return view('administrator.employeeMovements',compact('movements'));
    }
}
