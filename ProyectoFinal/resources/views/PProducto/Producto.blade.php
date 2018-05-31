@extends('PProducto.MasterProducto')
@section('title', 'Producto')

@php
	$message=Session::get('message');
	$productouno = $products[0];
	$idvendedor = $productouno->{'id-user'};
	$date = $productouno->{'created_at'};
	$fecha = $date->format('d-m-Y');
	$rutap = "../../imgproductos/";
  	$variablep= $productouno->{'image-product'};
   	$imagenp = $rutap.$variablep;

   $rutau = "../../fotografias/";
   $variableu= Session::get('Usuario')->{'image-user'};
   $imagenu = $rutau.$variableu;
@endphp

@section('content')
 <div class="container-fluid">

			    <div class="form-row">
			        	<form class="centrarBusqueda" action="/buscar/texto" method="GET" onsubmit="return validarbusqueda(this)">
			        		{{ csrf_field() }}
					    <div class="form-group sinpadding col-xs-2">
					    	<select class="form-control" id="depa" name="depa">
					    	<option value="0">Todos los departamentos</option>
							  @if($departamentos)
								  		@foreach($departamentos as $departamento)
								  			{<option value={{$departamento->{'id-department'} }}> {{$departamento->{'name-department'} }} </option>}
								  		@endforeach
								  	@endif
							</select>
					    </div>

				    	<div class="form-group sinpadding col-xs-7">
				    		<input class="form-control" type="text" name="tex" id="tex" placeholder="Buscar">
				    	</div>

				    	<div class="form-group sinpadding col-xs-1">
				    		<button type="submit" class="btn btn-success">Buscar</button>
				    	</div>
			    	</form>
			    </div>
			     </div>


		<div class="container">
				
				<article class="row">

						<div class="col-lg-6 col-md-6 col-sm-12 centrador">
						  <img class= "img-responsive center-block imagenproductocompra" alt="Miniatura" src="{{$imagenp}}"> 		
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							   <center> <h1>{{$productouno->{'name-product'} }}</h1> </center> <br>
							   <h2>PRECIO: ${{$productouno->{'price-product'} }}</h2> <br>
							   <h2>VENDEDOR: 
							   		<a href="{{ url("/Perfil/{$idvendedor}") }}">
							   			{{$productouno->{'first-name-user'} }} {{$productouno->{'last-name-user'} }}
							   		</a>
							   	</h2>
							   	<br>
							   <h2>FECHA DE LANZAMIENTO: {{$fecha}}</h2> <br>
							   <h2>DESCRIPCION:</h2>
							   <div class="descrip">{{$productouno->{'description-product'} }}</div> 
							   </h2>
							   <br>
							   <h2>CALIFICACIÓN: {{$calificacion}}
							   	@php
					    			for ($i=0; $i < $calificacion; $i++) { 
					    		@endphp
							    <img class="imgcomentario" src="../../estrella.png">
							    @php
								    }
								@endphp
								</h2>
								<br>
						</div>
				</article>

				<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<h2>AGREGAR AL CARRITO</h2>
								<form action="/Producto/comprar" method="GET" accept-charset="UTF-8" onsubmit="return validarCompra(this)">
			        			{{ csrf_field() }}
			        			<input type="hidden" name="id" value="{{$productouno->{'id-product'} }}">
			        			<input type="hidden" name="orden" value="{{$orden}}">
								    	<select class="form-control reportaje" required id="cantidad" name="cantidad">
								    		@php
								    			if($productouno->{'amount-product'} == 0){
								    		@endphp
								    			{<option value=0>0</option>}
								    		@php
								    			}else{
								    			for ($i=0; $i <$productouno->{'amount-product'} ; $i++) { 
								    		@endphp
									  			{<option value={{$i+1 }}>
									  			 {{$i+1 }}
									  			 </option>}
											@php
								    			}
								    		}
								    		@endphp
										</select>
							    		<button type="submit" class="btn btn-success">Agregar</button>
						    	</form>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4">
							<h2>Reportar Producto</h2> 
							<form action="/Producto/reportar" method="POST" accept-charset="UTF-8">
		        			{{ csrf_field() }}
		        			<input type="hidden" name="id" value="{{$productouno->{'id-product'} }}">
		        			<input type="hidden" name="orden" value="{{$orden}}">
								<select class="form-control reportaje" name="reporte">
									  @if($razones)
										  		@foreach($razones as $razon)
										  			{<option value={{$razon->{'id-reason'} }}> {{$razon->{'name-reason'} }} </option>}
										  		@endforeach
										  	@endif
									</select>
						    		<button type="submit" class="btn btn-success">Reportar</button>
							</form>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4">
							<h2>Calificar</h2>
							<form action="/Producto/calificar" method="POST" accept-charset="UTF-8">
		        			{{ csrf_field() }}
		        			<input type="hidden" name="id" value="{{$productouno->{'id-product'} }}">
		        			<input type="hidden" name="orden" value="{{$orden}}">
								<label class="radio-inline">
							      <input type="radio" 
									@php
										if($scoreusuario == 1){
									@endphp
									 checked
									@php
										}
									@endphp
							       name="optradio" required value="1">1
							    </label>

							    <label class="radio-inline">
							      <input type="radio" 
									@php
										if($scoreusuario == 2){
									@endphp
									 checked
									@php
										}
									@endphp
							       name="optradio" required value="2">2
							    </label>

							    <label class="radio-inline">
							      <input type="radio" 
									@php
										if($scoreusuario == 3){
									@endphp
									 checked
									@php
										}
									@endphp
							       name="optradio" required value="3">3
							    </label>

							    <label class="radio-inline">
							      <input type="radio" 
									@php
										if($scoreusuario == 4){
									@endphp
									 checked
									@php
										}
									@endphp
							       name="optradio" required value="4">4
							    </label>

							    <label class="radio-inline">
							      <input type="radio" 
									@php
										if($scoreusuario == 5){
									@endphp
									 checked
									@php
										}
									@endphp
							       name="optradio" required value="5">5
							    </label>

							    	<button type="submit" class="btn btn-success">Votar</button>
							</form>
						</div>

				</div>

				<br>
					<div class="form-row">
						    <form class="sinpadding" action="/Producto/comentar" method="POST" accept-charset="UTF-8" onsubmit="return validacion()">
		        			{{ csrf_field() }}
		        				<input type="hidden" name="id" value="{{$productouno->{'id-product'} }}">
		        				<input type="hidden" name="orden" value="{{$orden}}">
						    	<div class="form-group sinpadding col-lg-1 col-md-1 col-sm-1 col-xs-1">
						    		<img class="imgcomentario img-circle" src="{{$imagenu}}"> 
						    	</div>
						    	<div class="form-group sinpadding col-lg-10 col-md-10 col-sm-10 col-xs-10">
						    		<input class="form-control" type="text" required id="comentar" name="comentar" placeholder="Comentario">
						    	</div>

						    	<div class="form-group sinpadding col-lg-1 col-md-1 col-sm-1 col-xs-1">
						    		<button type="submit" class="btn btn-success">Comentar</button>
						    	</div>
					    	</form>
					    	<br>
					</div>
					<div class="form-row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h2>COMENTARIOS DEL PRODUCTO</h2>
						</div>

						<div class="comboordenar form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 sinpadding">
							<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<form action="/Producto/ordenar" method="GET" accept-charset="UTF-8">
			        			{{ csrf_field() }}
			        			<input type="hidden" name="id" value="{{$productouno->{'id-product'} }}">
						    	<select class="form-control" required name=ordencoment>
						    		@php
						    			if($orden == 1){
						    		@endphp
						    				<option value='1' selected>Nuevos-Viejos</option>
									  		<option value='2'>Viejos-Nuevos</option>	
									@php
						    			}else if($orden == 2){
						    		@endphp
						    				<option value='1'>Nuevos-Viejos</option>
									  		<option value='2' selected>Viejos-Nuevos</option>	
						    		@php	
						    			}
						    		@endphp
								</select>
								</div>
								<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
							    	<button type="submit" class="btn btn-success">Ordenar</button>
							    </div>
							</form>
					    </div>
					    </div>
					</div>

					@if($comentarios)
					@foreach($comentarios as $comentario)
						@php
							$rutap = "../../fotografias/";
						  	$variablep= $comentario->{'image-user'};
						   	$imagenp = $rutap.$variablep;
						   	$idcomenta = $comentario->{'id-user'};
						@endphp
						<div class="row">
								<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<b>{{$comentario->{'first-name-user'} }} {{$comentario->{'last-name-user'} }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$comentario->{'created_at'} }}<b>
								</div>
					    		<div class=" col-lg-1 col-md-1 col-sm-1 col-xs-1">
					    			<a href="{{ url("/Perfil/{$idcomenta}") }}">
							    		<img class="imgcomentario img-circle" src="{{$imagenp}}"> 
							    	</a>
						    	</div>
						    	<div class=" col-lg-11 col-md-11 col-sm-11 col-xs-11">
						    		<input class="form-control" type="text" readonly="true" value="{{$comentario->{'description-comment'} }}">
						    	</div>
						</div>
						<br>
					@endforeach
					@endif
					<div>
						<center> {!!$comentarios->render()!!}</center>
					</div>

	</div>

@endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("No puede votar por su mismo producto."); </script> 
	    @elseif($message == '2') 
		    <script> alert("Producto reportado."); </script> 
		@elseif($message == '3') 
		    <script> alert("Usted ya habia reportado este producto."); </script> 
		@elseif($message == '4') 
		    <script> alert("No puede reportar sus mismos productos."); </script> 
	    @elseif($message == '5') 
		    <script> alert("No puede votar si no ha comprado este producto."); </script> 
	    @elseif($message == '6') 
		    <script> alert("Cantidad insuficiente en el stock."); </script> 
	    @elseif($message == '7') 
		    <script> alert("Agregado al carrito correctamente."); </script> 
	    @elseif($message == '8') 
		    <script> alert("No puedes comprar tus mismos productos."); </script> 
	    @endif

		<script type="text/javascript">
			function validarbusqueda(dato){

				var nombretexto = dato['tex'].value;
				if(nombretexto == null || /^\s+$/.test(nombretexto)){
					alert('Empieza por letra o numero');
					return false;
				}else {
					return true;
				}

			}
			
	   		 function validacion(){
				var comentartext = document.getElementById(comentar.id).value;
				
				if(comentartext == null || comentartext.length == 0 || /^\s+$/.test(comentartext)){
					alert('Debe escribir algo correcto.');
					return false;
				}else {
					return true;
				}

			}
			function validarCompra(datos){
				var cantcant = datos['cantidad'].value;
				if(cantcant==0){
					alert('No hay productos en el stock');
					return false;
				}else{
					return true;
				}

			}
			function navbarfunction(){

			alert('Creadores de Winkel.\nMuñoz Copto Carlos Fernando - Frontend.\nChacón Briones César Alejandro - Backend.');
			return false;

			}
		 </script>
@endsection