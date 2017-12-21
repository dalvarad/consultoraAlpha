@extends('layouts.app')

@section('title', 'Modificar pago')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Pagos</H3></div>
	<div class="panel-body">
		{!! Form::open(['route' => ['admin.pago.update', $pago],'method' => 'PUT']) !!}
		{!! Form::label('monto', 'Monto') !!}
		{!! Form::text('monto', $pago->monto, ['class' => 'form-control', 'placeholder' => '10.000', 'required'])!!}

		<p></p>

		{!! Form::label('id_beca', 'Porcentaje de Beca') !!}
		{!! Form::select('id_beca', [$lista_beca], $pago->id_beca, ['class' => 'form-control', 'placeholder' => '20%']) !!}

		<p></p>

		{!! Form::label('fecha_pago', 'Fecha a pagar') !!}
		{!! Form::text('fecha_pago', $pago->fecha_pago, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}
	    
	    <p></p>

	    {!! Form::label('fecha_vencimiento', 'Fecha a vencer') !!}
		{!! Form::text('fecha_vencimiento', $pago->fecha_vencimiento, ['class' => 'form-control', 'placeholder' => '2017-01-01', 'required']) !!}

		<p></p>

		{!! Form::label('estado', 'Estado') !!}
		{!! Form::select('estado', ['pagado'=>'Pagado','pendiente'=>'Pendiente','atrasado'=>'Atrasado'], $pago->estado,['class' => 'form-control', 'placeholder' => 'estado', 'required']) !!}

		<p></p>


		<div align="center">
			{!! Form::submit('Modificar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
	</div>
</div>
	
	
@endsection	