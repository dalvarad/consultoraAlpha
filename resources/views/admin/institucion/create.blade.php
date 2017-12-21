@extends('layouts.app')

@section('title', 'Crear institucion')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Institución</H3></div>
	<div class="panel-body">
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
	</div>
</div>

	

@endsection	