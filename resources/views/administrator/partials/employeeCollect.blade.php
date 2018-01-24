@foreach($movements as $movement)
	<tr>
		<th class="text-center">{{ $movement->name }}</th>
		<th class="text-center">
			<input class="th text-center" disabled type="text" value="{{ $movement->value }}">
		</th>
	</tr>
@endforeach