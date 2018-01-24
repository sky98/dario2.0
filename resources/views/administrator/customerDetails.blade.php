@extends('layouts.administrator')
@section('title','Customer Details')


@section('container')
<div id="body">
    <div class="col-xs-6">
      <button id="pay" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalPay">Abonar</button>
    </div>
  	<div class="col-xs-6 col-md-6">
  		<button id="lend" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">
        Prestar
      </button>
  	</div>
    <div class="col-xs-12 col-md-4">
    	<label for="name">Nombre : </label>
    	<input disabled type="text" class="form-control" id="name" value="{{ $customer->name }}">
    </div>
    <div class="col-xs-12 col-md-4">
    	<label for="nit">Cedula : </label>
    	<input disabled type="text" class="form-control" id="nit" value="{{ $customer->nit }}">    	
    </div>
    <div class="col-xs-12 col-md-4">
    	<label for="phone">Telefono : </label>
    	<input disabled type="text" class="form-control" id="phone" value="{{ $customer->phone_number }}">    
      <br>	
    </div>
    @if ($debts->get('0') == null ||
         $debts->get('0')->current_balance <= 0)
      <script type="text/javascript">
        document.getElementById('pay').disabled = true;
      </script>
    @endif
    <div class="col-xs-12">    	
    	@foreach($debts as $debts)
    		@if ($debts->current_balance > 0)
    			<div class="col-xs-12 col-md-4 col-md-offset-2 text-center">
	    			<label for="initial_value">Saldos : </label>
            <br>
            <a id="balance_details" data-toggle="modal" data-target="#modalBalances"><i class="glyphicon glyphicon-zoom-in"></i></a>
    			</div>

    			<div class="col-xs-12 col-md-4">
	    			<label for="current_value">Saldo Actual : </label>
	    			<input disabled type="text" class="form-control" id="current_value" value="{{ $debts->current_balance }}">
            <input type="hidden" id="control_value" value="{{ $debts->current_balance }}">
    			</div>
    		@endif
		@endforeach	    	
    	@if($movements->get('0') != null)
    		<div class="col-xs-12 text-center">
		   		<label>Historial</label>
		   	</div>
		   	<div class="col-xs-12">
		   		<table class="table table-bordered table-hover">
		   			<thead>
  						<th  class="text-center">Valor</th>
  						<th  class="text-center">Tipo</th>
  					</thead>
  					<tbody>
  						@foreach($movements as $movements)
  							<tr>
  								<th class="th text-center">{{ $movements->value }}</th>
  								<th class="text-center">
  									@if ($movements->type == 1)
  										<span class="label label-info">Abonó</span>
  									@else
  										<span class="label label-danger">Prestó</span>
  									@endif
  								</th>
  							</tr>	
  						@endforeach
  					</tbody>
		    	</table>
		    </div>
    	@endif		   	
    </div>
    <br><br>
</div> 
@endsection

@section('underBody')
<div class="modal fade" id="modalPay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Abonar</h4>
        </div>
        <div class="modal-body">
        	<div class="input-group">
        		<span class="input-group-addon" id="basic-addon1">
	                <i class="glyphicon glyphicon-usd"></i>
	            </span>
	            <input type="text" class="form-control" placeholder="Valor" aria-describedby="basic-addon1" id="value1" required min="1000" step="1000" data-mask="00.000.000" data-mask-reverse="true">
        	</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
            </button>
            <button id="paySubmit" type="button" class="btn btn-success">
                Abonar
            </button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	$(".th").mask("00.000.000", {reverse: true});
    	$('#current_value').mask("00.000.000", {reverse: true});

      	$('#customer_id').val({{ $customer->id }});
      	$('#customer_idpay').val({{ $customer->id }});
      	$('#value1').attr({
        	"max" : $('#control_value').val()
      	});
    });
    $('#value1').bind('keyup change',function(){
	      var valu = $(this).val().replace('.','');
	      valu = valu.replace('.','');
	      $('#valueTrue').val(valu);
	      if(Number($('#valueTrue').val()) <= Number($('#control_value').val())){
	        $('#paySubmit').prop('disabled', false);
	      }
	      else{
	        $('#paySubmit').prop('disabled', true);
		    }
	});
</script>
@endsection
