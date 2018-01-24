@foreach($movements as $movement)
	<tr>
		<th class="text-center">{{ $movement->customer_id }}</th>
		<th class="text-center">
			<input class="th text-center" disabled type="text" value="{{ $movement->value }}">
		</th>
		<th class="text-center">{{ $movement->percentage }} %</th>
	</tr>
@endforeach