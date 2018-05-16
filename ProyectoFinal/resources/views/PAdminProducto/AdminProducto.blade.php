@extends('PAdminProducto.MasterAdminProducto')
@section('title', 'AdminProducto')
@section('content')
<div class="container">

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

							  	@foreach($productos as $producto)
							  	@if($productos)

							  	@endif
							  	@endforeach
							    <tr>
							      <th scope="row">{{ $producto->{'id-product'} }}</th>
							      <form class="form=group">
								      <td> <input class="form-control" type="text" required="true" name="" value="{{ $producto->{'name-product'} }}"> </td>
								      <td> <input class="form-control" type="text" required="true" name="" value="{{ $producto->{'price-product'} }}"> </td>
								      <td> <input class="form-control" type="text" required="true" name="" value="{{ $producto->{'amount-product'} }}"> </td>
								      <td> 
								      	<textarea class="form-control" rows="2" required="true"> {{ $producto->{'description-product'} }} </textarea> 
								      </td>
								   	  <td> 
								   	  	<select class="form-control">
											@if($departamentos)
										  		@foreach($departamentos as $departamento)
										  			{<option value={{$departamento->{'id-department'} }}> {{$departamento->{'name-department'} }} </option>}
										  		@endforeach
									  		@endif
										</select>
									 </td>
									
									 <td>
									 	<input class="form-control" required="true" type="file">
									 </td>

									 <td>  
									     <button type="submit" class="btn btn-primary">Modificar</button>
								   	  </td>
									  <td>  
									     <button type="button" class="btn btn-primary">Borrar</button>
								   	  </td>
							       </form>
							    </tr>

							  </tbody>
							</table>
		        </article>     
		</div>
	</div>

	<footer class="">
	    	
	</footer>

	@endsection