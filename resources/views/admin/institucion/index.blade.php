@extends('layouts.app')

@section('title', 'Listar Instituciones')


@section('content')


	 @if(Auth::user()->id_user_type ==1)
		<div align="center">
			<a href="{{ route('admin.institucion.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
		
		</div>
	@endif
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
					<td>{{ $institucion->nombre_institucion }}</td>
					<td>{{ $institucion->direccion }}</td>

					 @if(Auth::user()->id_user_type ==1)
						<td>
							<a href="{{ route('admin.institucion.edit', $institucion->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('admin.institucion.destroy', $institucion->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection