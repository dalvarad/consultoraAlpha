@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')

<div>
	<div align="center">
		<a href="{{ route('capacitaciones.create') }}" class="btn btn-info">Registrar nueva capacitacion</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Cupos</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Duracion</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($capacitaciones as $capacitacion)
				<tr>
					<td>{{ $capacitacion->id }}</td>
					<td>{{ $capacitacion->nombre }}</td>
					<td>{{ $capacitacion->cupos }}</td>
					<td>{{ $capacitacion->fecha_inicio }}</td>
					<td>{{ $capacitacion->fecha_fin }}</td>
					<td>{{ $capacitacion->duracion }} Meses</td>
					<td>
						<a href="{{ route('capacitaciones.edit', $capacitacion->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('capacitaciones.destroy', $capacitacion->id) }}" onclick="return confirm('¿Está seguro de eliminar la capacitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>

@endsection