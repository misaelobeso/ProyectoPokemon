<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listado completo de pokèmons</title>
</head>
<body>
	<h1>{{$pokemon->nombre}}</h1>
	<hr>
	<img src="{{ asset('/img/'.$pokemon->nombre.'.png') }}" width=180 height=180 alt="{{$pokemon->nombre}}">
	<hr>
	{{$pokemon->descripcion}}
</body>
</html>