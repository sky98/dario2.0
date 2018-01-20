<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdministratorController extends Controller
{
    public function main(){
    	$users = User::simplePaginate(5);
    	return view('administrator.main',compact('users'));
    }

    public function employees(){
    	$query = new User();
    	$employees = $query->employees()->simplePaginate(10);
    	return view('administrator.partials.employees',compact('employees'));
    }
}
