@extends('layouts.app')

@section('title', 'Lista de Capacitaciones con Pagos Atrasados.')

@section('content')

<div>
	<div align="center">
		<a href="#" class="btn btn-info">Registrar nueva capacitación.</a>
		<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-save-file">pdf</span></a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Capacitación</th>
			<th>Beca</th>
			<th>Pago</th>
			<th>Institución</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($query as $query)
				<tr>
					<td>{{ $query->rut }}</td>
					<td>{{ $query->first_name }}</td>
					<td>{{ $query->last_name }}</td>
					<td>{{ $query->nombre_capacitacion }}</td>
					<td>{{ $query->porcentaje }}</td>
					<td>{{ $query->estado }}
					<td>{{ $query->nombre_institucion }}</td>
					<td>
						<a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="#" onclick="return confirm('¿Está seguro de eliminar la capacitación seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>

@endsection