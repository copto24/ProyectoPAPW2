@extends('PHome.MasterHome')
@section('title', 'Home')

@php
	$message=Session::get('message');
	$cantidadpop = $productospopulares->count();
	$cantidadele = $productoselectronicos->count();
	$cantidadpel = $productospeliculas->count();
	$cantidadrop = $productosropas->count();
	$cantidaddep = $productosdeportes->count();
	$cantidadhog = $productoshogares->count();
	$cantidadmus = $productosmusicas->count();
	$cantidadjug = $productosjuguetes->count();
	$cantidadlib = $productoslibros->count();
	$cantidadofi = $productosoficinas->count();
	$cantidadsal = $productossalud->count();
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
						        	if ($cantidadpop == 0) {
								@endphp
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1" ></li>
									<li data-target="#carousel-example-generic" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadpop; $i++) { 
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
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadpop == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhome" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhome" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhome" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
				        		@if($productospopulares)
				        		@php
				        			$i = 0;
						        @endphp
								@foreach($productospopulares as $productopopular)
						        	@php
						        		$idproducto = $productopopular->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productopopular->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhome" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productopopular->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhome" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productopopular->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
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

<br>
<br>
		<div class="container">
			<div class="main row">
				<!-- Departamento Electronicos -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE ELECTRONICA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep1" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadele == 0) {
								@endphp
									<li data-target="#carouselDep1" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep1" data-slide-to="1" ></li>
									<li data-target="#carouselDep1" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadele; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep1" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep1" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadele == 0) {
								@endphp
										<div class="item active ititsub"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item ititsub">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item ititsub">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productoselectronicos)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productoselectronicos as $productoelectronico)
						        	@php
						        		$idproducto = $productoelectronico->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productoelectronico->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active ititsub">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productoelectronico->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item ititsub">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productoelectronico->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
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
					</div>
				</article>
				<!-- Departamento Peliculas -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE PELICULAS</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep2" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadpel == 0) {
								@endphp
									<li data-target="#carouselDep2" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep2" data-slide-to="1" ></li>
									<li data-target="#carouselDep2" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadpel; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep2" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep2" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadpel == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productospeliculas)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productospeliculas as $productopelicula)
						        	@php
						        		$idproducto = $productopelicula->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productopelicula->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productopelicula->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productopelicula->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
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
					</div>
				</article>
				<!-- Departamento Ropas -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep3" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadrop == 0) {
								@endphp
									<li data-target="#carouselDep3" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep3" data-slide-to="1" ></li>
									<li data-target="#carouselDep3" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadrop; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep3" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep3" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadrop == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productosropas)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productosropas as $productoropa)
						        	@php
						        		$idproducto = $productoropa->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productoropa->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productoropa->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productoropa->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
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
					</div>
				</article>
				<!-- Departamento Deportes -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE DEPORTE</h1>
					<div class="carrusel sinpadding col-xs-12">
					       <div id="carouselDep4" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidaddep == 0) {
								@endphp
									<li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep4" data-slide-to="1" ></li>
									<li data-target="#carouselDep4" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidaddep; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep4" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep4" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidaddep == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productosdeportes)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productosdeportes as $productodeporte)
						        	@php
						        		$idproducto = $productodeporte->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productodeporte->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productodeporte->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productodeporte->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
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
					</div>
				</article>
				<!-- Departamento Hogares -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE HOGAR</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep5" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadhog == 0) {
								@endphp
									<li data-target="#carouselDep5" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep5" data-slide-to="1" ></li>
									<li data-target="#carouselDep5" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadhog; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep5" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep5" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadhog == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productoshogares)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productoshogares as $productohogar)
						        	@php
						        		$idproducto = $productohogar->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productohogar->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productohogar->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productohogar->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep5" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep5" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
					</div>
				</article>
				<!-- Departamento Musica -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE MUSICA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep6" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadmus == 0) {
								@endphp
									<li data-target="#carouselDep6" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep6" data-slide-to="1" ></li>
									<li data-target="#carouselDep6" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadmus; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep6" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep6" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadmus == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productosmusicas)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productosmusicas as $productomusica)
						        	@php
						        		$idproducto = $productomusica->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productomusica->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productomusica->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productomusica->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep6" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep6" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
					</div>
				</article>
				<!-- Departamento Juguetes -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE JUGUETES</h1>
					<div class="carrusel sinpadding col-xs-12">
					     <div id="carouselDep7" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadjug == 0) {
								@endphp
									<li data-target="#carouselDep7" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep7" data-slide-to="1" ></li>
									<li data-target="#carouselDep7" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadjug; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep7" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep7" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadjug == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productosjuguetes)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productosjuguetes as $productojuguete)
						        	@php
						        		$idproducto = $productojuguete->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productojuguete->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productojuguete->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productojuguete->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep7" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep7" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
					</div>
				</article>
				<!-- Departamento Libros -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE LIBROS</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep8" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadlib == 0) {
								@endphp
									<li data-target="#carouselDep8" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep8" data-slide-to="1" ></li>
									<li data-target="#carouselDep8" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadlib; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep8" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep8" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadlib == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productoslibros)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productoslibros as $productolibro)
						        	@php
						        		$idproducto = $productolibro->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productolibro->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productolibro->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productolibro->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep8" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep8" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
					</div>
				</article>
				<!-- Departamento Oficinas -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE OFICINA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep9" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadofi == 0) {
								@endphp
									<li data-target="#carouselDep9" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep9" data-slide-to="1" ></li>
									<li data-target="#carouselDep9" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadofi; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep9" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep9" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadofi == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productosoficinas)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productosoficinas as $productooficina)
						        	@php
						        		$idproducto = $productooficina->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productooficina->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productooficina->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productooficina->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep9" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep9" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
					</div>
				</article>
				<!-- Departamento Salud -->
				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE SALUD</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep10" class="carousel slide carruselhome" data-ride="carousel">
					       <ol class="carousel-indicators">
					        	@php
						        	if ($cantidadsal == 0) {
								@endphp
									<li data-target="#carouselDep10" data-slide-to="0" class="active"></li>
									<li data-target="#carouselDep10" data-slide-to="1" ></li>
									<li data-target="#carouselDep10" data-slide-to="2" ></li>
								@php
						        	}else{
						        	for ($i=0; $i < $cantidadsal; $i++) { 
						        		if ($i == 0) {
						        @endphp
						        		<li data-target="#carouselDep10" data-slide-to="{{$i}}" class="active"></li>
						        @php
						        		}else{
						        @endphp
						        		<li data-target="#carouselDep10" data-slide-to="{{$i}}"></li>
						        @php		
						        		}
						        	}
						        }
						        @endphp
					        </ol>

					        <div class="carousel-inner caruno" role="listbox">
					        	@php
						        	if ($cantidadsal == 0) {
								@endphp
										<div class="item active itit"> 
						        			<img class="imgcarruselhomesub" src="logo.png" alt="First slide"> 
							          	</div>
							    
							          	<div class="item itit">
							          	   <img class="imgcarruselhomesub" src="img2.png" alt="First slide">
							         	 </div>

							         	 <div class="item itit">
							         	   <img class="imgcarruselhomesub" src="img3.png" alt="First slide">
							         	 </div>							
				         	 	@php
						        	}else{
						        @endphp
					        		@if($productossalud)
					        		@php
					        			$i = 0;
							        @endphp
								@foreach($productossalud as $productosalud)
						        	@php
						        		$idproducto = $productosalud->{'id-product'};
						        		$rutap = "imgproductos/";
									  	$variablep= $productosalud->{'image-product'};
									   	$imagenp = $rutap.$variablep;
							        		if ($i == 0) {
							        @endphp
							        		<div class="item active itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								            	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								            	</a>
								            	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productosalud->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php
							        	$i = 1;
							        		}else{
							        @endphp
							        		<div class="item itit">
							        			<a href="{{ url("/Producto/{$idproducto}/1") }}">
								             	<img class="imgcarruselhomesub" src="{{$imagenp}}" alt="First slide">
								             	</a>
								             	<div class="carousel-caption divcarrusel">
								            		<h3 class="letrascarusel">{{$productosalud->{'name-product'} }}<h3>
								            	</div>
								          	</div>
							        @php		
							        		}
							        @endphp
						        @endforeach
								@endif
								@php		
							        }
							    @endphp
					        </div>
					        
					        <a class="left carousel-control" href="#carouselDep10" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep10" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
						</div>
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