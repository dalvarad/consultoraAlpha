@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')

	 @if(Auth::user()->id_user_type ==1)
		<div align="center">
			<a href="{{ route('admin.empleado.create') }}" class="btn btn-info">Registrar Empleado</a>
		</div>
	@endif
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Rut</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($empleado as $empleado)
				<tr>
					<td>{{ $empleado->id }}</td>
					<td>{{ $empleado->first_name }}</td>
					<td>{{ $empleado->last_name }}</td>
					<td>{{ $empleado->rut }}</td>
					 @if(Auth::user()->id_user_type ==1)
						<td>
							<a href="{{ route('admin.empleado.edit', $empleado->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('admin.empleado.destroy', $empleado->id) }}" onclick="return confirm('¿Está seguro de eliminar al empleado seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection