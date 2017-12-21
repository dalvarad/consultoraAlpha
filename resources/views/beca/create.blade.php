@extends('layouts.app')

@section('title', 'Crear Beca')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Becas</H3></div>
	<div class="panel-body">
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
	</div>
</div>
	

@endsection	