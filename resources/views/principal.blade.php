<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pokémon</title>
	<script src="{{ asset("js/jquery.js") }}"></script>
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('/inicio')}}">Pokémon</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="{{url('/inicio')}}">Inicio <span class="sr-only">(current)</span></a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pokémons <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{url('/registrarPokemon')}}">Registrar</a></li>
	            <li><a href="{{url('/consultarPokemons')}}">Consultar pokémons</a></li>
	            <li class="divider"></li>
	            <li><a href="{{url('/asignarTipo')}}">Asignar a tipo</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipos <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{url('/registrarTipo')}}">Registrar</a></li>
	            <li><a href="{{url('/consultarTipos')}}">Consultar tipos</a></li>
	            <li class="divider"></li>
	            @foreach($tipos as $t)
	            	<li><a href="{{url('/consultarPorTipo')}}/{{$t->id}}">{{$t->nombre}}</a></li>
	            @endforeach
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				@yield('encabezado')
				<hr>
				@yield('contenido')
			</div>
		</div>
	</div>
	<footer>
		<hr>
		<div class="text-center">Proyecto pokémon &copy; 2016</div>
	</footer>
	<script src="{{ asset("js/bootstrap.js") }}"></script>
</body>
</html>