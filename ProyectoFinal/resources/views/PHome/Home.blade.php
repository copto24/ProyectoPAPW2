@extends('PHome.MasterHome')
@section('title', 'Home')

@php
	$message=Session::get('message');
	$cantidad = $productospopulares->count();
@endphp

@section('content')
  <div class="container-fluid">

			    <div class="form-row">
				    <form class="centrarBusqueda">
					    <div class="form-group sinpadding col-xs-2">
					    	<select class="form-control">
							  @if($departamentos)
								  		@foreach($departamentos as $departamento)
								  			{<option value={{$departamento->{'id-department'} }}> {{$departamento->{'name-department'} }} </option>}
								  		@endforeach
								  	@endif
							</select>
					    </div>

				    	<div class="form-group sinpadding col-xs-7">
				    		<input class="form-control" type="text" placeholder="Buscar">
				    	</div>

				    	<div class="form-group sinpadding col-xs-1">
				    		<button type="button" class="btn btn-success">Aceptar</button>
				    	</div>
			    	</form>
			    </div>

		        <div class="carrusel sinpadding col-xs-12">
					      <div id="carousel-example-generic" class="carousel slide carruselhome" data-ride="carousel">
					        <ol class="carousel-indicators">
					        	@php
						        	for ($i=0; $i < $cantidad; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@if($productospopulares)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productospopulares as $productopopular)
						        	@php
						        		$rutap = "imgproductos/";
									  	$variablep= $productopopular->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="www.google.com">
								            	<img class="imgcarrusel img-responsive" src="{{$imagenp}}" alt="First slide">
								            	</a>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="www.google.com">
								             	<img class="imgcarrusel img-responsive" src="{{$imagenp}}" alt="First slide">
								             	</a>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
					        </div>
					        
					        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
							</div>
					</div>

		</div> <!-- CONTAINER FLUID -->

		<div class="container">
			<div class="main row">

				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE ELECTRONICA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep1" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep1" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep1" data-slide-to="1"></li>
					          <li data-target="#carouselDep1" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					           <a href="www.google.com"> <img class="imgcarruselDep" src="logo.png" alt="First slide"> </a>
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>

					        </div>
					        <a class="left carousel-control" href="#carouselDep1" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep1" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE PELICULAS</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep2" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep2" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep2" data-slide-to="1"></li>
					          <li data-target="#carouselDep2" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep2" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep2" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep3" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep3" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep3" data-slide-to="1"></li>
					          <li data-target="#carouselDep3" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep3" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep3" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE DEPORTE</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE HOGAR</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE MUSICA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE JUGUETES</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE LIBROS</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE OFICINA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE SALUD</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>
			</div> <!--MAIN ROW -->

	    </div> <!--CONTAINER -->

	    <footer class="">
	    	
	    </footer>

	    <br>

@endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("Datos modificados correctamente."); </script> 
	    @endif

	    
		
	@endsection