@extends('layouts.app')

@section('title', 'Lista de Empleados con Capacitaciones.')

@section('content')

<div class="panel panel-primary">
    <!--<div class="panel-heading">Bienvenido a Consultora Alpha!</div>-->
    <div class="panel-heading"><H3>Capacitación.</H3></div>
    	<div class="panel-body">
    		<div>
	<div align="center">
		 @if(Auth::user()->id_user_type ==1)
			<a href="{{ route('admin.ebic.create') }}" class="btn btn-info">Registrar nueva capacitación.</a>
			<a href="{{ url('admin/pdfebic')}}" class="btn btn-danger"><span class="glyphicon glyphicon-save-file">pdf</span></a>
			<a href="{{ url('admin/porcentaje')}}" class="btn btn-danger"><span class="glyphicon glyphicon-save-file">Porcentaje empleados</span></a>
			<a href="{{ url('admin/pdfpendientes') }}" class="btn btn-success"><span class="glyphicon glyphicon-save-file">Capacitación con pagos pendientes.</span></a>
			<a href="{{ url('admin/pdfaldia') }}" class="btn btn-success"><span class="glyphicon glyphicon-save-file">Capacitación con pagos al día.</span></a>
		@endif
		
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
					<td>{{ $ebic->nombre_capacitacion }}</td>
					<td>{{ $ebic->porcentaje }}</td>
					<td>{{ $ebic->nombre_institucion }}</td>
					 @if(Auth::user()->id_user_type ==1)
						<td>
							<a href="{{ route('admin.ebic.edit', $ebic->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('admin.ebic.destroy', $ebic->id) }}" onclick="return confirm('¿Está seguro de eliminar la capacitación seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					@endif
				</tr>

			@endforeach
		</tbody>
	</table>


</div>
        </div>
</div>



@endsection