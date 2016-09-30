<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listado completo de pokèmons</title>
</head>
<body>
	<h1>Lista de pokèmons</h1>
	<hr>
	<table>
		<tr>
			<td>#</td>
			<td>Nombre</td>
			<td>Descripciòn</td>
		</tr>
		@foreach($pokemons as $p)
			<tr>
				<td>{{$p->id}}</td>
				<td>{{$p->nombre}}</td>
				<td>{{$p->descripcion}}</td>
			</tr>
		@endforeach
	</table>
</body>
</html>