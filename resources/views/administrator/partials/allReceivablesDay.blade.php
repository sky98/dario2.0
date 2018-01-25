@foreach($receivables as $receivable)
	<tr>
		<th class="text-center">{{ $receivable->name }}</th>
		<th class="text-center">
			<input class="th text-center" disabled type="text" value="{{ $receivable->value }}">
		</th>
	</tr>
@endforeach