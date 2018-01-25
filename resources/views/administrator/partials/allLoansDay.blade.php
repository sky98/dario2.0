@foreach($loans as $loan)
	<tr>
		<th class="text-center">{{ $loan->name }}</th>
		<th class="text-center">
			<input class="th text-center" disabled type="text" value="{{ $loan->value }}">
		</th>
		<th class="text-center">{{ $loan->percentage }} %</th>
	</tr>
@endforeach