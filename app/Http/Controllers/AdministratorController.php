<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\movements;
use App\models\customers;
use App\models\debts;

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
    	$array = [];
    	$employeeMovements = [];
    	$movements = movements::distinct()->select('created_at')->where('user_id',$id)->groupby('created_at')->get();
        foreach ($movements as $movement) {
            $array[] = $movement->created_at->format('Y-m-d');
        }
        $days = array_unique($array);
        foreach ($days as $day) {
            $raise = movements::whereDate('created_at',$day)->where('user_id',$id)->where('type',1)->sum('value');
            $pay = movements::whereDate('created_at',$day)->where('user_id',$id)->where('type',0)->sum('value');
            $aux =  [
            	'day' => $day,
            	'received' => $raise,
            	'loaned' => $pay,
            ];
            $employeeMovements[] = $aux;
        }
		return view('administrator.employeeMovements',compact('employeeMovements','id'));
    }

    public function employeeFees($id,$day,$type){
    	$movements = movements::whereDate('movements.created_at',$day)
                                ->where('movements.user_id',$id)
                                ->where('movements.type',$type)
                                ->join('customers','movements.customer_id','=','customers.id')
                                ->select('customers.name','movements.*')
                                ->get();
    	if($type == 1){
    		return view('administrator.partials.employeeCollect',compact('movements'));
    	}
    	else{
    		return view('administrator.partials.employeeLend',compact('movements'));
    	}    	
    }

    public function customers(){
        $customers = customers::orderBy('name','ASC')->simplePaginate(5);
        return view('administrator.customers',compact('customers'));
    }

    public function customerDetails($id){
        $customer = customers::find($id);
        $debts = debts::where('customer_id',$id)->get();
        $movements = movements::where('customer_id',$id)->get();
        return view('administrator.customerDetails',compact('customer','debts','movements'));
    }
}
