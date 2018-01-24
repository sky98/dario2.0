@extends('layouts.administrator')
@section('title','Customers')


@section('container')

@foreach ($customers as $customer)
<div class="col-xs-12 col-md-8 col-md-offset-2">
    <button type="button" class="btn btn-success btn-block" onclick="location.href='{{ route('customerDetails',$customer->id) }}'">
        {{ $customer->name }}
    </button>
    <br>
</div>  
@endforeach
{{ $customers->links() }}

@endsection