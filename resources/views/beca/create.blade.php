@extends('layouts.app')

@section('title', 'Crear Beca')

@section('content')

	
	{!! Form::open(['route' => 'beca.store','method' => 'POST']) !!}

 		{!! Form::label('porcentaje', 'Porcentaje') !!}
		{!! Form::text('porcentaje', null, ['class' => 'form-control', 'placeholder' => '20', 'required']) !!}

		<p></p>
		{!! Form::label('id_tipo_beca', 'Tipo Beca') !!}
		{!! Form::select('id_tipo_beca', ['1' => 'Matricula', '2' => 'Total(ejemplo)'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	