@extends('layouts.administrator')
@section('title','Main')

@section('home')
  class="active"
@endsection

@section('container')

@foreach ($employees as $employee)
<div class="col-xs-12 col-md-8 col-md-offset-2">
    <button type="button" class="btn btn-success btn-block" onclick="#">
        {{ $employee->name }}
    </button>
    <br>
</div>  
@endforeach
{{ $employees->links() }}

@endsection