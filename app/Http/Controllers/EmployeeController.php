<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\customers;
use App\models\debts;
use App\models\movements;

class EmployeeController extends Controller
{
    public function main(){
    	$customers = customers::simplePaginate(5);
    	return view('employee.main',compact('customers'));
    }

    public function customer($id){
    	$customer = Customers::find($id);
        $debts = debts::where('customer_id',$id)->get();
        $movements = movements::where('customer_id',$id)->get();
        return view('employee.customer',compact('customer','debts','movements'));
    }

    public function balances($id){
        $movements = Movements::where('customer_id',$id)->where('type',0)->get();
        return view('employee.partials.balances',compact('movements'));
    }

    public function pay(Request $request){
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
        return redirect()->action('EmployeeController@customer',$request->input('customer_id'));
    }

    public function lend(Request $request){
        if (debts::where('customer_id',$request->input('customer_id'))->get()->first() == null) {
            $debts = Debts::create([
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
        return redirect()->action('EmployeeController@customer',$request->input('customer_id')); 
    }

    public function newCustomer(){
    	return view('employee.newCustomer');
    }

    public function addCustomer(Request $request){
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

    public function personal(){
    	return view('employee.personal');
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

    public function updateEmail($user_id,$email){
        $user = User::find($user_id);
        $user->email = $email;
        $user->save();
        return 1;
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
