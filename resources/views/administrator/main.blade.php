@extends('layouts.administrator')
@section('title','Main')

@section('home')
  class="active"
@endsection

@section('container')
  <div id="body">
    <div class="col-xs-12 col-md-5">
    	<button type="button" class="btn btn-success btn-block" onclick="">
    		Empleados
      	</button>
    </div>    
    <div class="col-xs-12 col-md-2"></div>
    <div class="col-xs-12 col-md-5">
    	<button type="button" class="btn btn-info btn-block" onclick="">
    		Clientes
      	</button>
    </div>
    <br><br><br><br>
  </div>
@endsection