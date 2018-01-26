@foreach($receivables as $receivable)
	<tr>
		<th class="text-center">{{ $receivable->name }}</th>
		<th class="th text-center">{{ $receivable->value }}</th>
	</tr>
@endforeach