@extends('principal')

@section('encabezado')
	<h2>Pruebas</h2>
@stop

@section('contenido')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/Pikachu.png" alt="Chania">
    </div>

    <div class="item">
      <img src="img/Pikachu.png" alt="Chania">
    </div>

    <div class="item">
      <img src="img/Pikachu.png" alt="Flower">
    </div>

    <div class="item">
      <img src="img/Pikachu.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#prueba">
  		Pruebas
	</button>

	<div class="modal fade" id="prueba" tabindex="-1" role="dialog" aria-labelledby="pruebaLabel">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar">
			          	<span aria-hidden="true">&times;</span>
			        </button>
			        <h4 class="modal-title" id="pruebaLabel">Prueba pantalla modal</h4>
			    </div>
		      	<div class="modal-body">
		        	<p>
				        Confirmar la acción.
				        <b><span id="fav-title">Prueba</span></b> 
				        para ir a pagina de inicio.
		        	</p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<span class="pull-right">
		          		<a href="{{url('/inicio')}}">
			          		<button type="button" class="btn btn-primary">
			            		Aceptar
			          		</button>
		          		</a>
		        	</span>
		      	</div>
		    </div>
	  	</div>
	</div>
@stop