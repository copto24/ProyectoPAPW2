@extends('PPerfil.MasterPerfil')
@section('title', 'Perfil')

@php
	$message=Session::get('message');

	$nombre = $usuario[0]->{'first-name-user'};
	$apellido = $usuario[0]->{'last-name-user'};
	$date = $usuario[0]->{'created_at'};
	$fecha = $date->format('d-m-Y');
	$paisnombre = $usuario[0]->{'name-country'};
	$correo = $usuario[0]->{'email-user'};
	if($usuario[0]->{'gender-user'} == 0){
		$genero = 'Hombre';
	}else{
		$genero = 'Mujer';
	}
    $ruta = "../fotografias/";
  	$variable= $usuario[0]->{'image-user'};
   	$imagen = $ruta.$variable;


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


		<div class="container-fluid">
				
				<article class="row">

						<div class="col-lg-6 col-md-6 col-sm-6">
						  <img class= "imgPerfilVendedor img-circle" alt="img-perfil" src="{{$imagen}}"> 
						</div>

						<div class="sinpadding sinmargen col-lg-6 col-md-6 col-sm-6">
							   <h1 class="sinmargen">{{$nombre}} {{$apellido}}</h1><br>
							   <h2 class="sinmargen">Fecha de Afiliacion: {{$fecha}}</h2> <br>
							   <h2 class="sinmargen">Pais: {{$paisnombre}}</h2> <br>
							   <h2 class="sinmargen">Correo: {{$correo}}</h2> <br>
							   <h2 class="sinmargen">Genero: {{$genero}}</h2> <br>
						</div>

				</article>

		<article class="row">
			<div>
				 <center> <h1>PRODUCTOS DE ESTE VENDEDOR</h1> </center> <br>
			</div>

			<div class="row">
				@if($productos)
					@foreach($productos as $producto)
						@php
							$idproducto = $producto->{'id-product'};
							$nombreproducto = $producto->{'name-product'};
							$precio = $producto->{'price-product'};
							$rutap = "../imgproductos/";
						  	$variablep= $producto->{'image-product'};
						   	$imagenp = $rutap.$variablep;
						@endphp
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						 	<a href="{{ url("/Producto/{$idproducto}/1") }}" target="_self"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="{{$imagenp}}"> </a> 
							   <br> <center> {{$nombreproducto}} <br> ${{$precio}}</center>							
						</div>
					@endforeach
				@endif
			</div>
		</article>
		<div>
			<center> {!!$productos->render()!!}</center>
		</div>

	</div>


	@endsection


@section('scripts')
	    @if(count($errors) > 0)
			<script>
				alert("ERRORES.\n"+
				@foreach($errors->all() as $error)
				"{{$error}}\n"+
				@endforeach"");
			</script>
		@endif

	   	@if($message == '1') 
	    	<script> alert("Usuario Agregado Correctamente."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("Datos incorrectos."); </script>
    	@elseif($message == '3') 
	    	<script> alert("El correo ya existe."); </script>
    	@elseif($message == '4') 
	    	<script> alert("Ha sido bloqueado, contacte con un administrador."); </script>
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
			function navbarfunction(){

			alert('Creadores de Winkel.\nMuñoz Copto Carlos Fernando - Frontend.\nChacón Briones César Alejandro - Backend.');
			return false;

			}
	    </script>
		
@endsection