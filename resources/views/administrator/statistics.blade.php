@extends('layouts.administrator')
@section('title','Statistics')

@section('statistics')
  class="active"
@endsection

@section('container')
	<div class="col-xs-12 col-md-4 col-md-offset-2">
		<label for="dateDay">Fecha : </label>
		<input type="date" name="dateDay" id="dateDay" max="{{ $dateNow }}">	
	</div>
	<div class="col-xs-12 col-md-4">
		<button class="btn btn-success" id="find">Buscar</button>
	</div><br>
	<div class="col-xs-12" id="balances"></div>
	<br>
@endsection

@section('underBody')
	<div class="modal fade" id="modalPay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      	<div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		          <h4 class="modal-title" id="myModalLabel">Prestamos</h4>
		        </div>
		        <div class="modal-body">
		            <div class="col-xs-12">
			            <table class="table table-hover">
			                <thead>
			                	<tr>
			                  		<th class="text-center">Cliente</th>
			                    	<th class="text-center">Valor</th>
			                    	<th class="text-center">Porcentaje</th>
			                  	</tr>
			                </thead>
			                <tbody id="table-loans">
			                              
			                </tbody>
			            </table>	
		            </div>
		        </div>
		        <div class="modal-footer">
		        	<br>
		            <button type="button" class="btn btn-default" data-dismiss="modal">
		                Cerrar
		            </button>
		        </div>
	    	</div>
	    </div>
	</div>
	<div class="modal fade" id="modalReceivables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      	<div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		          <h4 class="modal-title" id="myModalLabel">Cobros</h4>
		        </div>
		        <div class="modal-body">
		            <div class="col-xs-12">
			            <table class="table table-hover">
			                <thead>
			                	<tr>
			                  		<th class="text-center">Cliente</th>
			                    	<th class="text-center">Valor</th>
			                  	</tr>
			                </thead>
			                <tbody id="table-receivables">
			                              
			                </tbody>
			            </table>	
		            </div>
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">
		                Cerrar
		            </button>
		        </div>
	    	</div>
	    </div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('#find').click(function(){
			if($('#dateDay').val() != 0){
				$.get("movementsDay/"+$('#dateDay').val()+"",function(response){
					$('#balances').html(response);
					$(".th").mask("00.000.000", {reverse: true});
			    });
			}
		});
		$(document).on('click','#labelLoans',function(){
			$.get("allLoansDay/"+$('#dateDay').val()+"",function(response){
				$('#table-loans').html(response);
				$(".th").mask("00.000.000", {reverse: true});
			});
		});
		$(document).on('click','#labelReceivables',function(){
			$.get("allReceivablesDay/"+$('#dateDay').val()+"",function(response){
				$('#table-receivables').html(response);
				$(".th").mask("00.000.000", {reverse: true});
			});
		});
	</script>
@endsection