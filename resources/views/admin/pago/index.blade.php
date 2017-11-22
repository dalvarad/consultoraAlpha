@extends('layouts.app')

@section('title', 'Listar Pagos')


@section('content')



	<div align="center">
		<a href="{{ route('admin.pago.create') }}" class="btn btn-info">Registrar nuevo pago</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Numero de Pago</th>
			<th>Beca</th>
			<th>Monto</th>
			<th>Fecha de Pago</th>
			<th>Fecha de Vencimiento</th>
			<th>Estado</th>
		
		</thead>
		<tbody>
			@foreach($pago as $pago)
				<tr>
					<td>{{ $pago->id }}</td>
					<td>{{ $pago->porcentaje }}</td>
					<td>{{ $pago->monto }}</td>
					<td>{{ $pago->fecha_pago }}</td>
					<td>{{ $pago->fecha_vencimiento }}</td>
					<td>{{ $pago->estado }}</td>

			
					<td>
						<a href="{{ route('admin.pago.edit', $pago->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('admin.pago.destroy', $pago->id) }}" onclick="return confirm('¿Está seguro de eliminar el pago seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection