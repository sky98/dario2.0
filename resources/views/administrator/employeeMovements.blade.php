@extends('layouts.administrator')
@section('title','Employee Movements')

@section('container')
<div class="col-xs-12">
	<table class="table table-bordered table-hover">
		<thead>
			<th class="text-center">Nombre</th>
			<th class="text-center">Tipo</th>
			<th class="text-center">Cantidad</th>
			<th class="text-center">Fecha</th>
		</thead>
		<tbody>
			@foreach($movements as $movement)
			<tr>
				<th>{{ $movement->customer_id }}</th>
				<th>{{ $movement->type }}</th>
				<th>{{ $movement->value }}</th>
				<th>{{ $movement->created_at }}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection