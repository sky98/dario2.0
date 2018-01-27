@extends('layouts.employee')
@section('title','Main')

@section('home')
  class="active"
@endsection

@section('container')
  <div id="body">
    <div class="col-xs-12 col-md-4 col-md-offset-6">
      <form action="{{ URL::asset('employee/search') }}" class="search-form" method="POST">
        <div class="form-group has-feedback">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="number" class="form-control" name="customer_id" id="search" placeholder="Buscar">
          <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
      </form>
    </div>
    <div class="col-xs-12 col-md-8 col-md-offset-2">
      <button type="button" class="btn btn-success btn-block" onclick="location.href='{{ route('customer',$customer->id) }}'">
        {{ $customer->name }}
      </button>
      <br><br>
    </div>
  </div>
@endsection