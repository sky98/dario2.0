@extends('layouts.administrator')
@section('title','Employee')

@section('container')
<input type="hidden" id="user_id" name="user_id" value="{{ $id }}">
<div class="col-xs-12 table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<th class="text-center">Fecha</th>
			<th class="text-center">Recaudos</th>
			<th class="text-center">Prestamos</th>
		</thead>
		<tbody>
			@foreach($employeeMovements as $movement)
			<tr>
				<th class="text-center"><input id="dateDay" style="border: none" class="text-center" disabled type="text" value="{{ $movement['day'] }}"></th>
				<th class="text-center">
					<span class="label label-info" id="labelReceived" data-toggle="modal" data-target="#modalReceived">
						<input class="th text-center" disabled type="text" value="{{ $movement['received'] }}">
					</span>
				</th>
				<th class="text-center">
					<span class="label label-danger" id="labelLoans" data-toggle="modal" data-target="#modalLoaned">
						<input class="th text-center" disabled type="text" value="{{ $movement['loaned'] }}">
					</span>
				</th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('underBody')
<div class="modal fade" id="modalReceived" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Recaudos</h4>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Valor</th>
                  </tr>
                </thead>
                <tbody id="table-received">
                              
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

<div class="modal fade" id="modalLoaned" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Prestamos</h4>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Porcentaje</th>
                  </tr>
                </thead>
                <tbody id="table-loaned">
                              
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
	$(document).on('click','#labelReceived',function(){
		$.get("../employeeFees/"+$('#user_id').val()+"/"+ $('#dateDay').val()+"/1",function(response){
				$('#table-received').html(response);
			});
	});
	$(document).on('click','#labelLoans',function(){
		$.get("../employeeFees/"+$('#user_id').val()+"/"+ $('#dateDay').val()+"/0",function(response){
				$('#table-loaned').html(response);
			});
	});
</script>
@endsection