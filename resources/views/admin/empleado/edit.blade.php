@extends('layouts.app')

@section('title', 'Editar empleado ' . $empleado->first_name)

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Empleado</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => ['admin.empleado.update', $empleado], 'method' => 'PUT']) !!}
		
		{!! Form::label('first_name', 'Nombre de Empleado') !!}
		{!! Form::text('first_name', $empleado->first_name, ['class' => 'form-control', 'placeholder' => 'Juan', 'required']) !!}

		{!! Form::label('last_name', 'Apellido') !!}
		{!! Form::text('last_name', $empleado->last_name, ['class' => 'form-control', 'placeholder' => 'Peréz', 'required']) !!}

		<p></p>
		{!! Form::label('rut', 'Rut') !!}
		{!! Form::text('rut', $empleado->rut, ['class' => 'form-control', 'placeholder' => '11.111.111-1', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>
	

@endsection