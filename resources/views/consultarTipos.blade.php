@extends('principal')

@section('encabezado')
	<h2>Consultar Tipos</h2>
	<a href="{{url('/pdfTipos')}}">
		<span class="glyphicon glyphicon-file" aria-hiden="true"></span>
	</a></h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos2 as $t)
				<tr> 
					<td>{{$t->id}}</td>
					<td>{{$t->nombre}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $tipos2->render() !!}
@stop