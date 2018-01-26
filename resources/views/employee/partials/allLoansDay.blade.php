@foreach($loans as $loan)
	<tr>
		<th class="text-center">{{ $loan->name }}</th>
		<th class="th text-center">{{ $loan->value }}</th>
		<th class="text-center">{{ $loan->percentage }} %</th>
	</tr>
@endforeach