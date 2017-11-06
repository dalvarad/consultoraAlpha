@extends('layouts.app')

@section('title', 'Lista de tipos de usuario')


@section('content')



	<div align="center">
		<a href="{{ route('admin.usertype.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>Tipo</th>
			<th>Acción</th>
		
		</thead>
		<tbody>
			@foreach($usertype as $type)
				<tr>
					<td>{{ $type->id }}</td>
					<td>{{ $type->name_type }}</td>
			
					<td>
						<a href="{{ route('admin.usertype.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('admin.usertype.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection