@extends('layouts.administrator')
@section('title','Register')
<!-- @section('user','Rober Sehuanez') -->

@section('register')
  class="active"
@endsection

@section('linkHead')
<style>
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	.switch input {display:none;}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>
@endsection

@section('container')
	<div class="col-xs-12">
		<form method="POST" action="{{ URL::asset('administrator/register') }}">
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="password" value="12345">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
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
			<div class="input-group" id="divDinamic">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
            	<input type="email" class="form-control" placeholder="Correo" aria-describedby="basic-addon1" name="email" required value="ejemplo@ejemplo.com">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">
					<i class="glyphicon glyphicon-cog"></i>
				</span>
            	<input readonly type="text" class="form-control" value="Cliente" aria-describedby="basic-addon1" name="role" id="role" style="background: #819FF7">
			</div>
			<br>
			<div class="col-xs-4 col-xs-offset-4 col-md-4 col-md-offset-5">
				<label class="switch">
            		<input id="checkBox" type="checkbox">
            		<div class="slider round"></div>
				</label>
			</div>
			<br>
			<div class="input-group col-xs-12">
         		<button type="submit" class="btn btn-success btn-block btn-lg">Registrar</button>
         	</div>
		</form>		
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
      $('#divDinamic').hide();
    });
	$('#checkBox').click(function(){
		if($('#checkBox').is(':checked')){
			$('#role').css({'background-color' : '#FACC2E'});
			$('#role').val('Empleado');	
			$('#divDinamic').show();	
		}
		else{
			$('#role').css({'background-color' : '#819FF7'});
			$('#role').val('Cliente');	
			$('#divDinamic').hide();
		}
	});
</script>
@endsection