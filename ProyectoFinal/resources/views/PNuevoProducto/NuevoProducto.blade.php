@extends('PNuevoProducto.MasterNuevoProducto')
@section('title', 'NuevoProducto')
@section('content')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h2>NUEVO PRODUCTO</h2>
				</center>
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

		        	<form action="/nuevoproducto" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
			        		{{ csrf_field() }}

				        	<div class="form-group">
				        		<label>Nombre:</label>
				        		<input class="form-control" id="nombre" name="nombre" type="text" required  maxlength="250" placeholder="Nombre:">
			        		</div>

			        		<div class="form-group">
				        		<label>Precio:</label>
				        		<input class="form-control" id="precio" name="precio" type="text" required maxlength="10"   placeholder="Precio:">
			        		</div>

			        		<div class="form-group">
				        		<label>Stock:</label>
				        		<input class="form-control" id="stock" name="stock" type="text" required maxlength="3" placeholder="Stock:">
			        		</div>

			        		<div class="form-group">
				        		<label>Descripción:</label>
				        		<input class="form-control" id="descripcion" name="descripcion" type="text" required  placeholder="Descripcion:">
			        		</div>

				        	<div class="form-group">
				        		<label>Departamento:</label>
				        		<select class="form-control" name="departamento">
				        			@if($departamentos)
								  		@foreach($departamentos as $departamento)
								  			{<option value={{$departamento->{'id-department'} }}> {{$departamento->{'name-department'} }} </option>}
								  		@endforeach
								  	@endif
								</select>
							</div>

			        		<div class="form-group">
				        		<label>Imagen del Producto:</label>
				        		<input class="form-control" required type="file" id="foto" name="foto" onchange="return fileValidation()">
			        		</div>
			        		
			        		<button type="submit" class="btn btn-primary">Agregar Producto</button>

			        	</form>
		        	<br>
		        </article>     
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

	    <script type="text/javascript">
	    	function fileValidation(){
			    var fileInput = document.getElementById('foto');
			    var filePath = fileInput.value;
			    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
			    if(!allowedExtensions.exec(filePath)){
			        alert('Solo pueden subirse imagenes jpg y png.');
				      	fileInput.value = '';
				        return false;			        
				}
			}

			 function validarSiNumero(numero){
			    if (!/^(\d{1,8},)*\d{1,7}(\.\d+)?$/.test(numero)){
			    	return true;
			    }else{
			    	return false;
			    }
			  }

			function validarNumero(numero){
			    if (!/^([0-9])*$/.test(numero)){
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

			function validacion(){
				var nombretexto = document.getElementById(nombre.id).value;
				var preciotexto = document.getElementById(precio.id).value;
				var stocktexto = document.getElementById(stock.id).value;
				var descripciontexto = document.getElementById(descripcion.id).value;

				if (nombretexto == null || nombretexto.length == 0 || /^\s+$/.test(nombretexto)) {
				    alert('El nombre es invalido');
    				return false;
				}else if(preciotexto == null || preciotexto.length == 0 || /^\s+$/.test(preciotexto) || validarSiNumero(preciotexto)){
					alert('El precio es invalido, debe ser un numero y tener dos decimales.');
    				return false;
				}else if(validateDecimal(preciotexto)){
					alert('Debe tener dos decimales');
					return false;
				}else if(validarNumero(stocktexto)){
					alert('El stock debe ser un numero');
					return false;
				}else if(descripciontexto == null || descripciontexto.length == 0 || /^\s+$/.test(descripciontexto)){
					alert('No deje el campo vacio.');
    				return false;
    			}else{
					return true;
				}

			}

			
	    </script>
@endsection