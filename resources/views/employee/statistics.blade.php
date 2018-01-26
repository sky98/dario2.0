@extends('layouts.employee')
@section('title','statistics')

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
	<br><br>
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
		$(document).ready(function(){
	      $(".th").mask("00.000.000", {reverse: true});
	    });
		$('#find').click(function(){
			if($('#dateDay').val() != 0){
				$.get("movementsDay/"+ {{ Auth::user()->id }} +"/"+ $('#dateDay').val()+"",function(response){
					$('#balances').html(response);
			    });
			}
		});
		$(document).on('click','#labelLoans',function(){
			$.get("allLoansDay/"+ {{ Auth::user()->id }} +"/"+ $('#dateDay').val()+"",function(response){
				$('#table-loans').html(response);
			});
		});
		$(document).on('click','#labelReceivables',function(){
			$.get("allReceivablesDay/"+ {{ Auth::user()->id }} +"/"+ $('#dateDay').val()+"",function(response){
				$('#table-receivables').html(response);
			});
		});
	</script>
@endsection