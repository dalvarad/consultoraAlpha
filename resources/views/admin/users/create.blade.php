@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Usuarios</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => 'admin.users.store','method' => 'POST']) !!}

 		{!! Form::label('name', 'Nombre de Usuario') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ramón Ramírez Roman', 'required']) !!}

		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'correo@correo.com', 'required']) !!}

		<p></p>
		{!! Form::label('password_confirmation', 'Contraseña Usuario') !!}
		{!! Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => '********', 'required']) !!}

		<p></p>
		{!! Form::label('password', 'Confirmar Contraseña') !!}
		{!! Form::password('password',['class' => 'form-control', 'placeholder' => '********', 'required']) !!}

		<p></p>
		{!! Form::label('id_user_type', 'Tipo de Usuario') !!}
		{!! Form::select('id_user_type', [$lista_tipo], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>


	

@endsection	