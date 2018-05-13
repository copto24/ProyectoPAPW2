@extends('PDepartamento.MasterDepartamento')
@section('title', 'Admin')
@section('content')
 <div class="container-fluid">

			    <div class="form-row">
				    <form class="centrarBusqueda">
					    <div class="form-group sinpadding col-xs-2">
					    	<select class="form-control">
							  <option>Filtro 1</option>
							  <option>Filtro 2</option>
							  <option>Filtro 3</option>
							  <option>Filtro 4</option>
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
			 </div>


			<div class="container-fluid">

				<div class="main row">
					<center>
						<h2>NOMBRE DEL DEPARTAMENTO</h2>
					</center>
				</div>
				
				<article class="row">

					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
						 	<a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>							
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
				 	</div>

				 	<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
						 	<a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>							
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
				 	</div>

				 	<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
						 	<a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>							
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							 <a href="Producto.php" target="_blank"> <img class= "img-responsive miniaturaproducto " alt="Miniatura" src="ropa.jpg"> </a> 
							   <br> <center> NOMBRE DEL PRODUCTO <br> Precio</center>
						</div>
				 	</div>
					
		</article>


	<footer class="footer">
	    	<center>
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
			</center>
	</footer>

	@endsection