@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Usuarios</H3></div>
	<div class="panel-body">
		<div align="center">
		<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if($user->id_user_type == "1")
							<span class="label label-danger">{{ $user->name_type }}</span>
						@elseif($user->id_user_type == "2")
							<span class="label label-info">{{ $user->name_type }}</span>
						@else
							<span class="label label-primary">{{ $user->name_type }}</span>
						@endif	
					</td>
					<td>
						<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>


	

@endsection