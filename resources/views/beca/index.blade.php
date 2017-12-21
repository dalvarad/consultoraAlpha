@extends('layouts.app')

@section('title', 'Lista de becas')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading"><H3>Becas</H3></div>
	<div class="panel-body">
		<div>
	 @if(Auth::user()->id_user_type ==1)
		<div align="center">
			<a href="{{ route('beca.create') }}" class="btn btn-info">Registrar nueva beca</a>
		
		</div>
	@endif
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
						 @if(Auth::user()->id_user_type ==1)
							<a href="{{ route('beca.edit', $becas->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('beca.destroy', $becas->id) }}" onclick="return confirm('¿Está seguro de eliminar la beca seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						@endif
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>


</div>
	</div>
</div>



@endsection