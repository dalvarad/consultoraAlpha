@extends('layouts.app')

@section('title', 'Listar tipos de becas')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading"><H3>Tipos de Becas</H3></div>
	<div class="panel-body">
		<div class="container">
	<div align="center">
		<a href="{{ route('tipobeca.create') }}" class="btn btn-info">Registrar nuevo tipo de beca</a>
	
	</div>
	<p></p>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($tipobeca as $tipobecas)
				<tr>
					<td>{{ $tipobecas->id }}</td>
					<td>{{ $tipobecas->tipo_beca }}</td>

					<td>
						<a href="{{ route('tipobeca.edit', $tipobecas->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
						<a href="{{ route('tipobeca.destroy', $tipobecas->id) }}" onclick="return confirm('¿Está seguro de eliminar la capacitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>
	</div>
</div>



@endsection