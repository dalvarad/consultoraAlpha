@extends('layouts.app')

@section('title', 'Editar Beca')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Becas</H3></div>
	<div class="panel-body">
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
	</div>
</div>

	

@endsection	