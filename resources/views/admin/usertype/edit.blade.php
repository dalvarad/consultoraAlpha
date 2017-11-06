@extends('layouts.app')

@section('title', 'Editar Tipo ' . $usertype->name_type)

@section('content')

	{!! Form::open(['route' => ['admin.usertype.update', $usertype], 'method' => 'PUT']) !!}


 		{!! Form::label('name_type', 'Nombre de Tipo') !!}
		{!! Form::text('name_type', $usertype->name_type, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}


		<p></p>

		<div align="center">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection