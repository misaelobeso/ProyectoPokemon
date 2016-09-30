@extends('principal')

@section('encabezado')
	<h2>Consultar Pokemons
	<a href="{{url('/pdfPokemons')}}">
		<span class="glyphicon glyphicon-file" aria-hiden="true"></span>
	</a></h2>
@stop

@section('contenido')
	{!! $pokemons->render() !!}
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Peso</th>
				<th>Altura</th>
				<th>Caramelos</th>
				<th>PC</th>
				<th>Vida</th>
				<th>Defensa</th>
				<th>Velocidad</th>
				<th>Cant. Caramelos</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pokemons as $p)
				<tr>
					<td>{{$p->id}}</td>
					<td><IMG SRC="{{ asset('/img/'.$p->nombre.'.png') }}" WIDTH=90 HEIGHT=90 ALT="{{$p->nombre}}"></td>
					<td>{{$p->nombre}}</td>
					<td>{{$p->descripcion}}</td>
					<td>{{$p->peso}}</td>
					<td>{{$p->altura}}</td>
					<td>{{$p->caramelos}}</td>
					<td>{{$p->puntos_combate}}</td>
					<td>{{$p->vida}}</td>
					<td>{{$p->defensa}}</td>
					<td>{{$p->velocidad}}</td>
					<td>{{$p->cantidad_caramelos}}</td>
					<td>
						<a href="{{url('/administrarPokemon')}}/{{$p->id}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-user" aria-hidden="true">Administrar</span></a>
						
						<a href="{{url('/actualizarPokemon')}}/{{$p->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span></a>
						
						<a href="{{url('/eliminarPokemon')}}/{{$p->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a>
					</td>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $pokemons->render() !!}
@stop