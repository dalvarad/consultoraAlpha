@extends('layouts.app')

@section('title', 'Editar Beca')

@section('content')
<h2>Beca.</h2>
	<br>

	{!! Form::open(['route' => ['beca.update', $beca], 'method' => 'PUT']) !!}

 		{!! Form::label('porcentaje', 'Porcentaje Capacitacion') !!}
		{!! Form::text('porcentaje', $beca->porcentaje, ['class' => 'form-control', 'placeholder' => 'Nombre Capacitacion', 'required']) !!}

		<p></p>
		{!! Form::label('id_tipo_beca', 'Tipo Beca') !!}
		{!! Form::select('id_tipo_beca', ['1' => 'Matricula', '2' => 'Total(ejemplo)'],$beca->id_tipo_beca, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	