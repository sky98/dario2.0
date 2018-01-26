@extends('layouts.employee')
@section('title','Main')

@section('home')
  class="active"
@endsection

@section('container')
  <div id="body">
    @foreach ($customers as $customer)
    <div class="col-xs-12 col-md-8 col-md-offset-2">
      <button type="button" class="btn btn-success btn-block" onclick="location.href='{{ route('customer', $customer->id ) }}'">
        {{ $customer->name }}
      </button>
    </div>  
    @endforeach
    {{ $customers->links() }}
  </div>
@endsection