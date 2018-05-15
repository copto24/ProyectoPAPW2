@extends('PNuevoProducto.MasterNuevoProducto')
@section('title', 'NuevoProducto')
@section('content')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h2>NUEVO PRODUCTO</h2>
				</center>

				@if(count($errors) > 0)
				@foreach($errors->all() as $error)
				@endforeach
					<script>
						alert("ERRORES.\n"+
							@foreach($errors->all() as $error)
							"{{$error}}\n"+
							@endforeach"");
					</script>
				@endif
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

		        	<form action="/nuevo" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
			        		{{ csrf_field() }}

				        	<div class="form-group">
				        		<label>Nombre:</label>
				        		<input class="form-control" id="nombre" name="nombre" type="text" required  placeholder="Nombre:">
			        		</div>

			        		<div class="form-group">
				        		<label>Precio:</label>
				        		<input class="form-control" id="precio" name="precio" type="text" required placeholder="Precio:">
			        		</div>

			        		<div class="form-group">
				        		<label>Stock:</label>
				        		<input class="form-control" id="stock" name="stock" type="text" required  placeholder="Stock:">
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
				        		<input class="form-control" required type="file" id="imagen" name="imagen" onchange="return fileValidation()">
			        		</div>

			        		<div class="hidden">
			        			@php
			        				$idusuario = Session::get('Usuario')->{'id-user'};
			        			@endphp
			        			<input type="text" id="idusuario" name="idusuario" value="{{$idusuario}}">
			        		</div>
			        		
			        		<button type="submit" class="btn btn-primary">Agregar Producto</button>

			        	</form>
		        	<br>
		        </article>     
		</div>


	<footer class="">
	    	
	</footer>

	</div>

@endsection

@section('scripts')
	    <script type="text/javascript">
	    	function fileValidation(){
			    var fileInput = document.getElementById('imagen');
			    var filePath = fileInput.value;
			    if(!allowedExtensions.exec(filePath)){
			        alert('Solo pueden subirse imagenes jpg y png.');
				      	fileInput.value = '';
				        return false;			        
				}
			    
			}

			function validacion(){
				var nombre = document.getElementById(nombre.id).value;
				var precio = document.getElementById(precio.id).value;
				var stock = document.getElementById(stock.id).value;
				var descripcion = document.getElementById(descripcion.id).value;

				var precioregex = /^[-\w.%+]{1,64}@(?:[0-9]{1,63}\.){1,125}[0-9]{2,63}$/i;

				if (!precioregex.test(precio)) {
				    alert('El precio es invalido');
    				return false;
				}else if (!precioregex.test(stock)) {
				    alert('El stock es invalido');
    				return false;
				}else if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)){
					alert('El nombre es un dato invalido');
					return false;
				}else if(descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)){
					alert('La descripcion es un dato invalido');
					return false;
				}else {
					return true;
				}

			}

			
	    </script>
		
	    @endsection