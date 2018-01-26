@extends('layouts.employee')
@section('title','New Customer')
<!-- @section('user','Rober Sehuanez') -->

@section('newCustomer')
  class="active"
@endsection

@section('container')
	<div class="col-xs-12">
		<form method="POST" action="{{ URL::asset('employee/newCustomer') }}">
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-barcode"></i></span>
            	<input type="number" class="form-control" placeholder="Identificacion" aria-describedby="basic-addon1" name="nit" id="nit" value="{{old('nit')}}" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
            	<input type="text" class="form-control" placeholder="Nombre Completo" aria-describedby="basic-addon1" name="name" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-home"></i></span>
            	<input type="text" class="form-control" placeholder="Direccion" aria-describedby="basic-addon1" name="address" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-earphone"></i></span>
            	<input type="text" class="form-control" placeholder="Telefono" aria-describedby="basic-addon1" name="phone_number" required>
			</div>
			<br>
			<div class="input-group col-xs-12">
         		<button type="submit" class="btn btn-success btn-block btn-lg">Registrar</button>
         	</div>
		</form>		
	</div>
@endsection