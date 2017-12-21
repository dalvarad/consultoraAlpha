@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h2>Capacitación.</h2>
	<br>

<div class="container">
	{!! Form::open(['route' => ['capacitaciones.update',$capacitacion],'method' => 'PUT']) !!}

 		{!! Form::label('nombre', 'Nombre Capacitacion') !!}
		{!! Form::text('nombre', $capacitacion->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Capacitacion', 'required']) !!}

		{!! Form::label('cupos', 'Cupos') !!}
		{!! Form::text('cupos', $capacitacion->cupos, ['class' => 'form-control', 'placeholder' => '10', 'required']) !!}

		<p></p>
		{!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
		{!! Form::text('fecha_inicio',$capacitacion->fecha_inicio,['class' => 'form-control', 'placeholder' => '2017-12-20', 'required']) !!}

		<p></p>
		{!! Form::label('fecha_fin', 'Fecha Fin') !!}
		{!! Form::text('fecha_fin',$capacitacion->fecha_fin,['class' => 'form-control', 'placeholder' => '2017-12-20', 'required']) !!}

		<p></p>
		{!! Form::label('duracion', 'Duracion Meses') !!}
		{!! Form::text('duracion',$capacitacion->duracion,['class' => 'form-control', 'placeholder' => '2', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
</div>

@endsection	