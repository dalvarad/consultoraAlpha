@extends('layouts.app')

@section('title', 'Modificar capacitación.'. $ebic->id)

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Capacitación</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => ['admin.ebic.update', $ebic], 'method' => 'PUT']) !!}

	<p></p>
	{!! Form::label('id_empleado', 'Rut Empleado') !!}
	{!! Form::select('id_empleado', [$lista_empleados], $ebic->id_empleado, ['class' => 'form-control', 'required', 'placeholder' => '11.111.111-1']) !!}

	<p></p>
	{!! Form::label('id_beca', 'Beca') !!}
	{!! Form::select('id_beca', [$lista_beca], $ebic->id_beca, ['class' => 'form-control', 'required', 'placeholder' => '20']) !!}
	
	<p></p>
	{!! Form::label('id_institucion', 'Institución') !!}
	{!! Form::select('id_institucion', [$lista_instituciones], $ebic->id_institucion, ['class' => 'form-control', 'required', 'placeholder' => 'Instituto Simon Bolivar']) !!}
	
	<p></p>
	{!! Form::label('id_capacitacion', 'Capacitación') !!}
	{!! Form::select('id_capacitacion', [$lista_capacitaciones], $ebic->id_capacitacion,['class' => 'form-control', 'required', 'placeholder' => 'primeros auxilios']) !!}

	<p></p>
	<div align="center">
		{!! Form::submit('Registrar Reserva', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
	</div>
</div>

	

@endsection