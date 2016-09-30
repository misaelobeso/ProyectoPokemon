@extends('principal')
@section('encabezado')
	<h1>Registrar Pokémon</h1>
@stop

@section('contenido')
	<form action="{{url('/guardarPokemon')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required>
		</div>
		<div class="form-group">
			<label for="descripcion">Descripción</label>
			<input type="text" class="form-control" name="descripcion" required>
		</div>
		<div class="form-group">
			<label for="peso">Peso</label>
			<input type="number" step="any" class="form-control" name="peso" required>
		</div>
		<div class="form-group">
			<label for="altura">Altura</label>
			<input type="number" step="any" class="form-control" name="altura" required>
		</div>
		<div class="form-group">
			<label for="caramelos">Caramelos</label>
			<input type="number" class="form-control" name="caramelos" required>
		</div>
		<div class="form-group">
			<label for="puntos_combate">Puntos de Combate</label>
			<input type="number" class="form-control" name="puntos_combate" required>
		</div>
		<div class="form-group">
			<label for="vida">Vida</label>
			<input type="number" class="form-control" name="vida" required>
		</div>
		<div class="form-group">
			<label for="defensa">Defensa</label>
			<input type="number" class="form-control" name="defensa" required>
		</div>
		<div class="form-group">
			<label for="velocidad">velocidad</label>
			<input type="number" class="form-control" name="velocidad" required>
		</div>
		<input type="submit" class="btn btn-primary">
		<a href="{{url('/inicio')}}" class="btn btn-danger">Cancelar</a>
	</form>
@stop