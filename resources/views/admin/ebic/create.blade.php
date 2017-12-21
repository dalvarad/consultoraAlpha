@extends('layouts.app')

@section('title', 'Crear capacitación.')

@section('content')
<h2>Capacitaciones.</h2>
<br>

	{!! Form::open(['route' => 'admin.ebic.store', 'method' => 'POST']) !!}

	<p></p>
	{!! Form::label('id_empleado', 'Rut Empleado') !!}
	{!! Form::select('id_empleado', [$lista_empleados], null, ['class' => 'form-control', 'required', 'placeholder' => '11.111.111-1']) !!}

	<p></p>
	{!! Form::label('id_beca', 'Beca') !!}
	{!! Form::select('id_beca', [$lista_beca], null, ['class' => 'form-control', 'required', 'placeholder' => '20']) !!}
	
	<p></p>
	{!! Form::label('id_institucion', 'Institución') !!}
	{!! Form::select('id_institucion', [$lista_instituciones],null, ['class' => 'form-control', 'required', 'placeholder' => 'Instituto Simon Bolivar']) !!}
	
	<p></p>
	{!! Form::label('id_capacitacion', 'Capacitación') !!}
	{!! Form::select('id_capacitacion', [$lista_capacitaciones], null,['class' => 'form-control', 'required', 'placeholder' => 'primeros auxilios']) !!}

	<p></p>
	<div align="center">
		{!! Form::submit('Registrar Reserva', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

@endsection