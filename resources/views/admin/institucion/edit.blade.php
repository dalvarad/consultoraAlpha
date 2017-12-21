@extends('layouts.app')

@section('title', 'Editar Institucion ' . $institucion->nombre)

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Institución</H3></div>
	<div class="panel-body">
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
	</div>
</div>

	

@endsection