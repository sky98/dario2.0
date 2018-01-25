<div class="col-xs-12 col-md-4 col-md-offset-2">
	<label for="raise">Cobros : </label><br>
	<span class="label label-info" id="labelReceivables" data-toggle="modal" data-target="#modalReceivables">
		<input class="th text-center" disabled type="text" value="{{ $raise }}">
	</span>
</div>
<div class="col-xs-12 col-md-4">
	<label for="pay">Prestamos : </label><br>
	<span class="label label-danger" id="labelLoans" data-toggle="modal" data-target="#modalPay">
		<input class="th text-center" disabled type="text" value="{{ $pay }}">
	</span>
</div>