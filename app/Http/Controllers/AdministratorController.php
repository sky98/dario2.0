<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\movements;
use App\models\customers;
use App\models\debts;
use Auth;
use Carbon\Carbon;

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

    public function collection(Request $request){
        $debts = Debts::where('customer_id',$request->input('customer_id'))->get()->first();
        $debts->current_balance = $debts->current_balance - $request->input('value');
        $debts->save();
        $movements = Movements::create([
            'type' => 1,
            'value' => $request->input('value'),
            'percentage' => 0,
            'user_id' => $request->input('user_id'),
            'customer_id' => $request->input('customer_id'),
        ]);
        return redirect()->action('AdministratorController@customerDetails',$request->input('customer_id'));
    }

    public function loans(Request $request){
        if (debts::where('customer_id',$request->input('customer_id'))->get()->first() == null) {
            $debts = debts::create([
                'initial_balance' => $request->input('initial_balance'),
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
            'value' => $request->input('initial_balance'),
            'percentage' => $request->input('percentage'),
            'user_id' => $request->input('user_id'),
            'customer_id' => $request->input('customer_id'),
        ]);
        return redirect()->action('AdministratorController@customerDetails',$request->input('customer_id')); 
    }

    public function balanceDetails($id){
        $movements = Movements::where('customer_id',$id)->where('type',0)->get();
        return view('administrator.partials.balanceDetails',compact('movements'));
    }

    public function register(){
        return view('administrator.register');
    }

    public function add(Request $request){
        if($request->input('role') == 'Cliente'){
            if (customers::where('nit',$request->input('nit'))->get()->first() == null) {
                $customer = new customers();
                $data = $request->all();
                $customer->create($data);
                return redirect()->back()->with('alert','Usuario Creado con Exito');
            }
            else{
              return redirect()->back()->with('alert','Numero de Identificacion no valido');  
            }
        }
        else{
            if(User::where('nit',$request->input('nit'))->get()->first() == null){
                if(User::where('email',$request->input('email'))->get()->first() == null){
                    $password = bcrypt(substr($request->input('nit'),0,5).ucwords(substr($request->input('name'),0,1)));
                    $user = User::create([
                        'nit' => $request->input('nit'),
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'state' => 1,
                        'role' => 'e',
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
    }

    public function personal(){
        return view('administrator.personal');
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

    public function statistics(){
        $dateNow = Carbon::now()->format('Y-m-d');
        return view('administrator.statistics',compact('dateNow'));
    }

    public function movementsDay($date){
        $raise = movements::whereDate('created_at',$date)->where('type',1)->sum('value');
        $pay = movements::whereDate('created_at',$date)->where('type',0)->sum('value');
        return view ('administrator.partials.movements' ,compact('raise','pay'));
    }

    public function allLoansDay($date){
       $loans = Movements::whereDate('movements.created_at',$date)
                            ->where('movements.type',0)
                            ->join('customers','movements.customer_id','=','customers.id')
                            ->select('customers.name','movements.*')->get();
        return view('administrator.partials.allLoansDay',compact('loans'));
    }

    public function allReceivablesDay($date){
       $receivables = Movements::whereDate('movements.created_at',$date)
                            ->where('movements.type',1)
                            ->join('customers','movements.customer_id','=','customers.id')
                            ->select('customers.name','movements.*')->get();
        return view('administrator.partials.allReceivablesDay',compact('receivables'));
    }

}
