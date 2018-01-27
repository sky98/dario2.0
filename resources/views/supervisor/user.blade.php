@extends('layouts.supervisor')
@section('title','User')

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
<div class="col-xs-12 col-md-4 col-md-offset-4">
  <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
  <div class="form-group">
    <label for="nit">Identificacion : </label>
    <input readonly type="number" class="form-control" id="nit" name="nit" value="{{ $user->nit }}">
  </div>
  <div class="form-group">
    <label for="name">Nombre : </label>
    <input readonly type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
  </div>
  <div class="form-group">
    <label for="email">Correo : </label>
    <input readonly type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
  </div>
  <div class="form-group">
    <label for="state">Estado : </label>
    @if($user->state == 1)
      <input style="background-color: #3498DB" readonly type="state" class="form-control" id="state" name="state" value="Habilitado">
    @else
      <input style="background-color: #E74C3C" readonly type="state" class="form-control" id="state" name="state" value="Deshabilitado">
    @endif
  </div>
  <div class="col-xs-12 col-md-offset-4">
    <label class="switch">
    @if($user->state == 1)
      <input id="checkBox" type="checkbox" checked>
    @else
      <input id="checkBox" type="checkbox">
    @endif
      <div class="slider round"></div>
    </label>
  </div>
</div>
<br><br>
@endsection

@section('script')
<script type="text/javascript">
  $('#checkBox').click(function(){
    if($('#checkBox').is(':checked')){
      $.get("../changeState/"+ $("#user_id").val()+"/1",function(response){
        $('#state').val("Habilitado");
        $('#state').css({'background-color' : '#3498DB'});
      });     
    }
    else{
      $.get("../changeState/"+ $("#user_id").val()+"/0",function(response){
        $('#state').val("Deshabilitado");
        $('#state').css({'background-color' : '#E74C3C'});
      }); 
    }
  });
</script>
@endsection