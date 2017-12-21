@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Tipos de Capacitaciones</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => 'capacitaciones.store','method' => 'POST']) !!}

 		{!! Form::label('nombre_capacitacion', 'Nombre Capacitacion') !!}
		{!! Form::text('nombre_capacitacion', null, ['class' => 'form-control', 'placeholder' => 'Nombre Capacitacion', 'required']) !!}

		{!! Form::label('cupos', 'Cupos') !!}
		{!! Form::text('cupos', null, ['class' => 'form-control', 'placeholder' => '10', 'required']) !!}

		<p></p>
		{!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
		{!! Form::text('fecha_inicio',null,['class' => 'form-control', 'placeholder' => '2017-12-20', 'required']) !!}

		<p></p>
		{!! Form::label('fecha_fin', 'Fecha Fin') !!}
		{!! Form::text('fecha_fin',null,['class' => 'form-control', 'placeholder' => '2017-12-20', 'required']) !!}

		<p></p>
		{!! Form::label('duracion', 'Duracion Meses') !!}
		{!! Form::text('duracion',null,['class' => 'form-control', 'placeholder' => '2', 'required']) !!}

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
 			jQuery('#fecha_inicio').datetimepicker({
 				timepicker: false,
  				format:'Y-m-d',
  				onShow:function( ct ){
  					this.setOptions({
  						maxDate:jQuery('#fecha_fin').val()?jQuery('#fecha_fin').val():false
  					})
  				},
 			});
 			jQuery('#fecha_fin').datetimepicker({
 				timepicker: false,
  				format:'Y-m-d',
  				onShow:function( ct ){
  					this.setOptions({
  				  		minDate:jQuery('#fecha_inicio').val()?jQuery('#fecha_inicio').val():false
  				 	})
 				},
			});
		});
	</script>

@endsection