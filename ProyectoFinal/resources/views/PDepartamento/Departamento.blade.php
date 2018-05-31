@extends('PDepartamento.MasterDepartamento')
@section('title', 'Busqueda')

@php
	$message=Session::get('message');
	$idusuario = Session::get('Usuario')->{'id-user'};
	$busq = $busqueda;
	if($busq==0){
		$nombredepartamento = $nombredepa;
	}else{
		$nombredepartamento = $nombredepa->{'name-department'};
	}
	$contador = 0;
@endphp

@section('content')
 <div class="container-fluid">

        	<form action="/buscar/filtros" method="GET" onsubmit="return validarbusqueda(this)">
        		{{ csrf_field() }}
			   <div class="form-row">
			   		 <div class="form-group sinpadding col-lg-12 col-md-12 col-sm-12 col-xs-12">

					    <div class="form-group sinpadding col-sm-2 col-sm-offset-1 col-xs-2">
					    	<select class="form-control" id="depa" name="depa">
					    	<option value="0">Todos los departamentos</option>
							  @if($departamentos)
								  		@foreach($departamentos as $departamento)
								  			{<option value={{$departamento->{'id-department'} }}
											@php
								  				if($iddepa == $departamento->{'id-department'}){
											@endphp
												selected 
								  			@php		
								  				}
								  			@endphp
								  			> {{$departamento->{'name-department'} }} </option>}
								  		@endforeach
								  	@endif
							</select>
					    </div>

				    	<div class="form-group sinpadding col-sm-7 col-xs-8">
				    		<input class="form-control" type="text" name="tex" id="tex" value="{{$texto}}" placeholder="Buscar">
				    	</div>

				    	<div class="form-group sinpadding col-sm-1 col-xs-1">
				    		<button type="submit" class="btn btn-success">Buscar</button>
				    	</div>
			    	</div>
			    </div>

			    <div class="form-row">
			    	<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12">
			    		<div class=" sinpadding col-lg-5 col-md-5 col-sm-7 col-xs-4">
							<h4>Precio Inicial:</h4> 
						</div>
						<div class=" sinpadding col-lg-7 col-md-7 col-sm-5 col-xs-8">
							<input class="form-control filtros sinpadding" type="text" id="PrecioI" maxlength="8" name="PrecioI" value="{{ $PrecioI}}">
						</div>	
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    		<div class=" sinpadding col-lg-5 col-md-5 col-sm-7 col-xs-4">
							<h4>Precio Final:</h4> 
						</div>
						<div class=" sinpadding col-lg-7 col-md-7 col-sm-5 col-xs-8">
							<input class="form-control filtros sinpadding" type="text" id="PrecioF" maxlength="8" name="PrecioF" value="{{ $PrecioF}}">
						</div>	
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    		<div class=" sinpadding col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<h4>Valor:</h4> 
						</div>
						<div class="sinpadding col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<select class="form-control filtros sinpadding" id="valor" name="valor">
					    		<option value="0" 
					    		@php
						  			if($Valor == 0){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					    		>Ningun valor</option>
					    		<option value="1"
					    		@php
						  			if($Valor == 1){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					  			>1</option>
					    		<option value="2"
					    		@php
						  			if($Valor == 2){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					  			>2</option>
					    		<option value="3"
					    		@php
						  			if($Valor == 3){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					  			>3</option>
					    		<option value="4"
					    		@php
						  			if($Valor == 4){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					  			>4</option>
					    		<option value="5"
					    		@php
						  			if($Valor == 5){
								@endphp
									selected 
					  			@php		
					  				}
					  			@endphp
					  			>5</option>
							</select>
						</div>	
					</div>
			    </div>
	    	</form>
			   
 </div>

		<div class="container-fluid">

				<div class="main row">
					<center>
						<h2>{{$nombredepartamento}}</h2>
					</center>
				</div>
				
			<article class="row">


				@if($productos)
					@foreach($productos as $producto)
					@php
						$idproducto = $producto->{'id-product'};
						$nombreproducto = $producto->{'name-product'};
						$precio = $producto->{'price-product'};
						$rutap = "/imgproductos/";
					  	$variablep= $producto->{'image-product'};
					   	$imagenp = $rutap.$variablep;
						$contador = $contador + 1;
						if($contador == 1){
					@endphp
						<div class="row">
					@php
						}
						if($contador <= 4){
					@endphp

						<div class="col-lg-3 col-md-3 col-sm-6">
						 	<a href="{{ url("/Producto/{$idproducto}/1") }}" target="_self"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="{{$imagenp}}"> </a> 
							   <br> <center> {{$nombreproducto}}  <br> ${{$precio}}</center>							
						</div>
					@php
					}
						if($contador == 4){
					@endphp
						</div>
					@php
						}
						if($contador == 5){
					@endphp
							<div class="row">
					@php
						}
						if($contador >= 5 && $contador <= 8){
					@endphp
						<div class="col-lg-3 col-md-3 col-sm-6">
						 	<a href="{{ url("/Producto/{$idproducto}/1") }}" target="_self"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="{{$imagenp}}"> </a> 
							   <br> <center> {{$nombreproducto}}  <br> ${{$precio}}</center>							
						</div>
					@php
					}
						if($contador == 8){
					@endphp
						</div>
					@php
						}
					@endphp
		 			@endforeach
		  		@endif

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
			 function validarSiNumero(numero){
			    if (!/^(\d{1,8},)*\d{1,7}(\.\d+)?$/.test(numero)){
			    	return true;
			    }else{
			    	return false;
			    }
			  }

			  function validateDecimal(valor) {
			    var RE = /^\d*(\.\d{1})?\d{1,1}$/;
			    if (RE.test(valor)) {
			        return false;
			    } else {
			        return true;
			    }
			}

			function validarbusqueda(dato){

				var nombretexto = dato['tex'].value;
				var precioItexto = dato['PrecioI'].value;
				var precioFtexto = dato['PrecioF'].value;

				if(nombretexto == null || /^\s+$/.test(nombretexto)){
					alert('Empieza por letra o numero');
					return false;
				}else if(precioItexto == null || precioItexto.length == 0 || /^\s+$/.test(precioItexto) || validarSiNumero(precioItexto)){
					alert('El precio inicial es invalido, debe ser un numero y tener dos decimales.');
    				return false;
				}else if(validateDecimal(precioItexto)){
					alert('Debe tener dos decimales');
					return false;
				}else if(precioFtexto == null || precioFtexto.length == 0 || /^\s+$/.test(precioFtexto) || validarSiNumero(precioFtexto)){
					alert('El precio final es invalido, debe ser un numero y tener dos decimales.');
    				return false;
				}else if(validateDecimal(precioFtexto)){
					alert('Debe tener dos decimales');
					return false;
				}else if(parseFloat(precioItexto) > parseFloat(precioFtexto)){

					alert('El precio inicial no puede ser mayor que el precio final');
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