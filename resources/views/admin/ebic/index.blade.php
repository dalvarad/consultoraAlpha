@extends('layouts.app')

@section('title', 'Lista de Empleados con Capacitaciones.')

@section('content')

<div>
	<div align="center">
		<a href="{{ route('admin.ebic.create') }}" class="btn btn-info">Registrar nueva capacitación.</a>
		<a href="{{ url('admin/pdfebic')}}" class="btn btn-danger"><span class="glyphicon glyphicon-save-file">pdf</span></a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Capacitación</th>
			<th>Beca</th>
			<th>Institución</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($ebic as $ebic)
				<tr>
					<td>{{ $ebic->rut }}</td>
					<td>{{ $ebic->first_name }}</td>
					<td>{{ $ebic->last_name }}</td>
					<td>{{ $ebic->capacitacion->nombre }}</td>
					<td>{{ $ebic->porcentaje }}</td>
					<td>{{ $ebic->institucion->nombre }}</td>
					<td>
						<a href="{{ route('admin.ebic.edit', $becas->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('admin.ebic.destroy', $becas->id) }}" onclick="return confirm('¿Está seguro de eliminar la capacitación seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>

@endsection