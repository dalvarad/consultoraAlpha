@extends('layouts.app')

@section('title', 'Crear pago')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Pagos</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => 'admin.pago.store','method' => 'POST']) !!}

 		{!! Form::label('monto', 'Monto') !!}
		{!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => '10.000', 'required'])!!}

		<p></p>

		{!! Form::label('id_beca', 'Porcentaje de Beca') !!}
		{!! Form::select('id_beca', [$lista_beca], null, ['class' => 'form-control', 'placeholder' => '20%']) !!}

		<p></p>

		{!! Form::label('fecha_pago', 'Fecha a pagar') !!}
		{!! Form::text('fecha_pago', null, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}
	    
	    <p></p>

	    {!! Form::label('fecha_vencimiento', 'Fecha a vencer') !!}
		{!! Form::text('fecha_vencimiento', null, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}

		<p></p>


		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>

@endsection	

@section('js')
	<script>
		jQuery(function(){
 			jQuery('#fecha_pago').datetimepicker({
  				timepicker: false,
  				format: 'Y-m-d'
 			});
 			jQuery('#fecha_vencimiento').datetimepicker({
 				timepicker: false,
  				format:'Y-m-d',
  				onShow:function( ct ){
  					this.setOptions({
  				  		minDate:jQuery('#fecha_pago').val()?jQuery('#fecha_pago').val():false
  				 	})
 				},
			});
		});
	</script>

@endsection