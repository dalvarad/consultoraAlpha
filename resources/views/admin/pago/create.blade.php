@extends('layouts.app')

@section('title', 'Crear pago')

@section('content')

<h2>Pago.</h2>
	<br>

	{!! Form::open(['route' => 'admin.pago.store','method' => 'POST']) !!}

 		{!! Form::label('monto', 'Monto') !!}
		{!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => '10.000', 'required'])!!}

		<p></p>

		{!! Form::label('id_beca', 'Porcentaje de Beca') !!}
		{!! Form::select('id_beca', [$lista_beca], null, ['class' => 'form-control', 'placeholder' => '20%']) !!}

		<p></p>

		{!! Form::label('fecha_pago', 'Fecha a pagar') !!}
		{!! Form::text('fecha_pago', null, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}
	    
	    <p></p>

	    {!! Form::label('fecha_vencimiento', 'Fecha a vencer') !!}
		{!! Form::text('fecha_vencimiento', null, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}

		<p></p>


		<div align="center">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection	