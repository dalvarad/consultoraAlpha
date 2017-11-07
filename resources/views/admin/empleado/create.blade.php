@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')


	{!! Form::open(['route' => 'admin.empleado.store','method' => 'POST']) !!}

 		{!! Form::label('first_name', 'Nombre de Empleado') !!}
		{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Juan', 'required']) !!}

		{!! Form::label('last_name', 'Apellido') !!}
		{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Peréz', 'required']) !!}

		<p></p>
		{!! Form::label('rut', 'Rut') !!}
		{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '11.111.111-1', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	