@extends('layouts.app')

@section('title', 'Crear institucion')

@section('content')


	{!! Form::open(['route' => 'admin.institucion.store','method' => 'POST']) !!}

 		{!! Form::label('nombre_institucion', 'Nombre de institucion') !!}
		{!! Form::text('nombre_institucion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre institucion', 'required']) !!}


		<p></p>

		{!! Form::label('direccion', 'direccion') !!}
		{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese direccion', 'required']) !!}
	    
	    <p></p>


		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	