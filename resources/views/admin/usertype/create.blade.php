@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')


	{!! Form::open(['route' => 'admin.usertype.store','method' => 'POST']) !!}

 		{!! Form::label('name_type', 'Nombre de tipo') !!}
		{!! Form::text('name_type', null, ['class' => 'form-control', 'placeholder' => 'tipo', 'required']) !!}


		<p></p>

		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	