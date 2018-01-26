@foreach($movements as $movement)
	<tr>
		<th class="th text-center">{{ $movement->value }}</th>
		<th class="text-center">{{ $movement->percentage }} %</th>
	</tr>
@endforeach