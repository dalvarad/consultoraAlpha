@extends('layouts.app')

@section('title', 'Crear Beca')

@section('content')
<h2>Beca.</h2>
	<br>
	
	{!! Form::open(['route' => 'beca.store','method' => 'POST']) !!}

 		{!! Form::label('porcentaje', 'Porcentaje') !!}
		{!! Form::text('porcentaje', null, ['class' => 'form-control', 'placeholder' => '20', 'required']) !!}

		<p></p>
		{!! Form::label('id_tipo_beca', 'Tipo Beca') !!}
		{!! Form::select('id_tipo_beca', [$lista_tipo], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	