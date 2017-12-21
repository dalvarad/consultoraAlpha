@extends('layouts.app')

@section('title', 'Crear Tipo Beca')

@section('content')

<div class="container">
	<div class="panel panel-primary">
	<div class="panel-heading"><H3>Tipos de Becas</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => ['tipobeca.update',$tipobeca],'method' => 'PUT']) !!}

 		{!! Form::label('tipo_beca', 'Nombre Capacitacion') !!}
		{!! Form::text('tipo_beca', $tipobeca->tipo_beca, ['class' => 'form-control', 'placeholder' => 'Nombre Capacitacion', 'required']) !!}

	

		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>
	
</div>

@endsection	