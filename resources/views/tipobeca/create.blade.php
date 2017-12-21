@extends('layouts.app')

@section('title', 'Crear Tipo Beca')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Tipos de Becas</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => 'tipobeca.store','method' => 'POST']) !!}

 		{!! Form::label('tipo_beca', 'Tipo de Beca') !!}
		{!! Form::text('tipo_beca', null, ['class' => 'form-control', 'placeholder' => 'Arancel', 'required']) !!}


		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>

	

@endsection	