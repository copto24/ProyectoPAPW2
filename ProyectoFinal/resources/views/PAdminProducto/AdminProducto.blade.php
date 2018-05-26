@extends('PAdminProducto.MasterAdminProducto')
@section('title', 'AdminProducto')

@php
	$message=Session::get('message');
@endphp

@section('content')
<div class="container-fluid">

				<div class="main row centrarajustes">

				<center>
					<h1>ADMINISTRACION DE PRODUCTOS</h1>
				</center>
				
				<h2>TABLA DE PRODUCTOS</h2>

				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding table-responsive">

						<table class="table table-striped">
							  
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Nombre</th>
							      <th scope="col">Precio</th>
							      <th scope="col">Stock</th>
							      <th scope="col">Descripcion</th>
							      <th scope="col">Departamento</th>
							      <th scope="col">Imagen</th>
							      <th scope="col">Modificar</th>
							      <th scope="col">Eliminar</th>
							    </tr>
							 
							  <tbody>
							  	@if($productos)
								  	@foreach($productos as $producto)
								  	 <tr>
								      <form action="adminproducto/modificar" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion(this)">
								      	{{ csrf_field() }}
								      	<input name="_method" type="hidden" value="PUT">
								      	<input type="hidden" name="id" value="{{ $producto->{'id-product'} }}">

								     	<th scope="row">{{ $producto->{'id-product'} }}</th>
								      	<td> <input class="form-control" type="text" id="nombre"  name="nombre" maxlength="250" value="{{ $producto->{'name-product'} }}"> 
								      	</td>
								      	<td> <input class="form-control" type="text" id="precio" name="precio" maxlength="10" value="{{ $producto->{'price-product'} }}">
								      	 </td>
									    <td> <input class="form-control" type="text" id="stock" name="stock" maxlength="3" value="{{ $producto->{'amount-product'} }}">
									     </td>
									    <td> 
									    <textarea class="form-control adprod" id="descripcion" name="descripcion" rows="2"> {{ $producto->{'description-product'} }} </textarea> 
									    </td>
									   	<td> 
									   	 	<select class="form-control" id="departamento" name="departamento">
												@if($departamentos)
											  		@foreach($departamentos as $departamento)
											  			{<option value={{$departamento->{'id-department'} }}
											  			@php
											  			if($producto->{'id-department'} == $departamento->{'id-department'}){
														@endphp
															selected 
											  			@php		
											  				}
											  			@endphp
											  				> {{$departamento->{'name-department'} }} </option>}
											  		@endforeach
										  		@endif
											</select>
										</td>
										
										<td>
										 	<input class="form-control" type="file" id="foto" name="foto" onchange="return fileValidation()">
										</td>

										<td>  
										    <button type="submit" class="btn btn-primary">Modificar</button>
									   	</td>
									   	</form>

									  <form action="adminproducto/eliminar" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data">
								      		{{ csrf_field() }}
								      		<input name="_method" type="hidden" value="DELETE">
								      	<td>
								      		<input type="hidden" name="id" value="{{ $producto->{'id-product'} }}">
										    <button type="submit" class="btn btn-primary">Borrar</button>
								   	 	</td>
								   	  </form>
								    </tr>
								  	@endforeach
							  	@endif
							  </tbody>
							</table>
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

	   	@if($message == '1') 
	    	<script> alert("Producto agregado correctamente."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("Producto modificado correctamente."); </script>
	    @elseif($message == '3') 
	    	<script> alert("Producto eliminado correctamente."); </script>
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

			function validacion(datos){
				var nombretexto = datos['nombre'].value;
				var preciotexto = datos['precio'].value;
				var stocktexto = datos['stock'].value;
				var descripciontexto =datos['descripcion'].value;

				if (nombretexto == null || /^\s+$/.test(nombretexto)) {
				    alert('El nombre es invalido');
    				return false;
				}else if(preciotexto == null || /^\s+$/.test(preciotexto) || validarSiNumero(preciotexto)){
					alert('El precio es invalido, debe ser un numero y tener dos decimales.');
    				return false;
				}else if(validateDecimal(preciotexto)){
					alert('Debe tener dos decimales');
					return false;
				}else if(validarNumero(stocktexto)){
					alert('El stock debe ser un numero');
					return false;
				}else if(descripciontexto == null || /^\s+$/.test(descripciontexto)){
					alert('No deje el campo vacio.');
    				return false;
    			}else{
					return true;
				}

			}

			
	    </script>
		
@endsection