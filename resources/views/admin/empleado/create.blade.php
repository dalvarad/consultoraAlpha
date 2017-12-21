@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Empleado</H3></div>
	<div class="panel-body">
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
		
	</div>
</div>


	

@endsection	