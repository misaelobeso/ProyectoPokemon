@extends('principal')

@section('encabezado')
	<h2>Pokemons</h2></h2>
@stop

@section('contenido')
	@foreach($pokemons_tipos as $pt)
		<div class="col-xs-3">
		   <div class="thumbnail">
		      <img src="{{ asset('/img/'.$pt->pokemon.'.png') }}" width=180 height=180 alt="{{$pt->pokemon}}">
		      <div class="caption">
		          <h3>{{$pt->pokemon}}</h3>
		              <p>Descripción</p>
		          <p>
		          <a href="{{url('/quitarTipo2')}}/{{$pt->id_pokemon}}/{{$pt->id_tipo}}" class="btn btn-danger">Eliminar</a> 
		          <a href="{{url('/pdfPokemon')}}/{{$pt->id_pokemon}}" class="btn btn-default">Descargar</a>
		          </p>
		      </div>
		   </div>
		 </div>
	@endforeach
@stop