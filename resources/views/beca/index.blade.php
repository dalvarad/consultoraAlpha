@extends('layouts.app')

@section('title', 'Lista de becas')

@section('content')

<div>
	<div align="center">
		<a href="{{ route('beca.create') }}" class="btn btn-info">Registrar nueva beca</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Porentaje</th>
			<th>Tipo Beca</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($beca as $becas)
				<tr>
					<td>{{ $becas->id }}</td>
					<td>{{ $becas->porcentaje }}</td>
					<td>{{ $becas->tipo_beca }}</td>
					<td>
						<a href="{{ route('beca.edit', $becas->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('beca.destroy', $becas->id) }}" onclick="return confirm('¿Está seguro de eliminar la beca seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>

@endsection