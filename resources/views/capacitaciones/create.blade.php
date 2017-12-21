@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h2>Capacitación.</h2>
	<br>


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

@endsection	