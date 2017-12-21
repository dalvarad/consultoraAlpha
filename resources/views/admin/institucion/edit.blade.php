@extends('layouts.app')

@section('title', 'Editar Institucion ' . $institucion->nombre)

@section('content')

<h2>Institución.</h2>
	<br>

	{!! Form::open(['route' => ['admin.institucion.update', $institucion], 'method' => 'PUT']) !!}


 		{!! Form::label('nombre', 'Nombre de Institucion') !!}
		{!! Form::text('nombre', $institucion->nombre_institucion, ['class' => 'form-control', 'placeholder' => ' Institucion', 'required']) !!}


		<p></p>


 		{!! Form::label('direccion', 'Nombre de Tipo') !!}
		{!! Form::text('direccion', $institucion->direccion, ['class' => 'form-control', 'placeholder' => ' Direccion', 'required']) !!}

			<p></p>

		<div align="center">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection