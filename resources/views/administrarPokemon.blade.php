@extends('principal')

@section('encabezado')
	<IMG SRC="{{ asset('/img/'.$pokemon->nombre.'.png') }}" WIDTH=180 HEIGHT=180 ALT="{{$pokemon->nombre}}">
	<h2>Pokémon: {{$pokemon->nombre}}</h2>
@stop
 
@section('contenido')
	<form action="{{url('/agregarTipo')}}/{{$pokemon->id}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<select name="id_tipo" class="form-control">
				@foreach($tiposP as $t)
					<option value="{{$t->id}}">{{$t->nombre}}</option>
				@endforeach
			</select>
		</div>
		<input type="submit" value="Agregar" class="btn btn-primary">
	</form>
	<h2>El pokemon {{$pokemon->nombre}} es de tipo:</h2>
	<hr>
	<table class="table table-hover">
		<thead> 
			<tr>
				<th>#</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tiposP2 as $tp)
				<tr>
					<td>{{$tp->id}}</td>
					<td>{{$tp->nombre}}</td>
					<td><a href="{{url('/quitarTipo')}}/{{$pokemon->id}}/{{$tp->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Quitar</span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop





