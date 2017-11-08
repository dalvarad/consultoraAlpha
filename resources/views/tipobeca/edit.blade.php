@extends('layouts.app')

@section('title', 'Crear Tipo Beca')

@section('content')

<div class="container">
	{!! Form::open(['route' => ['tipobeca.update',$tipobeca],'method' => 'PUT']) !!}

 		{!! Form::label('tipo_beca', 'Nombre Capacitacion') !!}
		{!! Form::text('tipo_beca', $tipobeca->tipo_beca, ['class' => 'form-control', 'placeholder' => 'Nombre Capacitacion', 'required']) !!}

	

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
</div>

@endsection	