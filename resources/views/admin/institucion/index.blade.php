@extends('layouts.app')

@section('title', 'Listar Instituciones')


@section('content')



	<div align="center">
		<a href="{{ route('admin.institucion.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Direccion</th>
		
		</thead>
		<tbody>
			@foreach($institucion as $institucion)
				<tr>
					<td>{{ $institucion->id }}</td>
					<td>{{ $institucion->nombre }}</td>
					<td>{{ $institucion->direccion }}</td>

			
					<td>
						<a href="{{ route('admin.institucion.edit', $institucion->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('admin.institucion.destroy', $institucion->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection