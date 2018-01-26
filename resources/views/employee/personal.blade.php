@extends('layouts.employee')
@section('title','Personal')

@section('personal')
  class="active"
@endsection

@section('container')
	<div class="col-xs-12 col-md-4 col-md-offset-4">
		<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
		<br>
		<div class="form-group">
			<label for="nit">Identificacion : </label>
			<input type="number" class="form-control" id="nit" name="nit" value="{{ Auth::user()->nit }}">
		</div>
		<div class="form-group">
			<label for="name">Nombre : </label>
			<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
		</div>
		<div class="form-group">
			<label for="email">Correo : </label>
			<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
		</div>
		<div class="form-group">
        	<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#password">Cambiar Contraseña</button>
    	</div>
    </div>
@endsection

@section('underBody')
	<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       	<div class="modal-dialog" role="document">
            <div class="modal-content">
     	        <div class="modal-header">
        	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        	<span aria-hidden="true">&times;</span>
        	        </button>
                	<h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
              	</div>
              	<div class="modal-body">
              		<form method="POST" action="{{ URL::asset('employee/updatePassword') }}">
		                <div class='input-group col-xs-12'>
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		                    <label for='old_password'>Antigua Contraseña : </label>
		                    <input required type="password" id="oldPassword" name="oldPassword" class="form-control">
		                </div>
		                <div class='input-group col-xs-12'>
		                    <label for='new_password'>Nueva Contraseña : </label>
		                    <input required type="password" id="newPassword" name="newPassword" class="form-control">
		                </div>
		                <div class='input-group col-xs-12'>
		                    <label for='new_password2'>Confirmar Contraseña : </label>
		                    <input required type="password" id="newPassword2" name="newPassword2" class="form-control">
		                </div> 
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
		                </div>
		            </form>
              	</div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">
		$('#nit').change(function(){
			nit = {{ Auth::user()->nit }};
			$.get("updateNit/"+ $("#user_id").val() +"/"+ $(this).val() +"",function(response,valor){
				if(response == 1){
					$.notify("Se ha actualizado el registro...","success");
				}
				else{
					$.notify("Identificacion ya registrada","success");
					$('#nit').val(""+nit);
				}
			});
		});
		$('#name').change(function(){
			$.get("updateName/"+ $("#user_id").val() +"/"+ $(this).val() +"",function(response,valor){
				$.notify("Se ha actualizado el registro...","success");
			});
		});
		$('#email').change(function(){
			$.get("updateEmail/"+ $("#user_id").val() +"/"+ $(this).val() +"",function(response,valor){
				$.notify("Se ha actualizado el registro...","success");
			});			
		});
	</script>
@endsection