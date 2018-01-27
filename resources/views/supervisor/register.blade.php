@extends('layouts.supervisor')
@section('title','Register')
<!-- @section('user','Rober Sehuanez') -->

@section('register')
  class="active"
@endsection

@section('container')
	<div class="col-xs-12">
		<form method="POST" action="{{ URL::asset('supervisor/newUser') }}">
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
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
            	<input type="email" class="form-control" placeholder="Correo" aria-describedby="basic-addon1" id="email" name="email" required placeholder="Correo">
			</div>
			<br>
			<div class="input-group col-xs-12">
         		<button type="submit" class="btn btn-success btn-block btn-lg">Registrar</button>
         	</div>
         	<br>
		</form>		
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$('#checkBox').click(function(){
		if($('#checkBox').is(':checked')){
			$('#role').css({'background-color' : '#FACC2E'});
			$('#role').val('Empleado');	
			$('#divDinamic').show();
			$('#email').val('');
		}
		else{
			$('#role').css({'background-color' : '#819FF7'});
			$('#role').val('Cliente');	
			$('#divDinamic').hide();
			$('#email').val('correo@correo.com');
		}
	});
</script>
@endsection