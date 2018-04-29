<!DOCTYPE html>
<html>

	<head>
		<title>PROYECTO PAPW2</title>
		<meta charset="utf-8"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">  
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	</head>

	<body class="fondo">
		<!--Barra de navegacion -->
				<nav class="navbar barra">
			      <div class="container-fluid">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed cuadro" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar linea"></span>
			            <span class="icon-bar linea"></span>
			            <span class="icon-bar linea"></span>
			          </button>
			           <img class="logo2 navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" src="logo.png">
			        </div>

			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav">
			          		<li> <img class="logohome" src="logo.png"> </li>
				            <li class="active"><a href="#">Inicio</a></li>
				            <li><a href="#about">Acerca de</a></li>
				            <li><a href="#contact">Contacto</a></li>
				            <li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departamentos <span class="caret"></span></a>
				              <ul class="dropdown-menu">
				                <li><a href="#">Electronica</a></li>
				                <li><a href="#">Juegos</a></li>
				                <li><a href="#">Peliculas</a></li>
				                <li><a href="#">Ropa</a></li>
				                <li><a href="#">Calzado</a></li>
				              </ul>
				            </li>
				            
			          </ul>

			           <ul class="nav navbar-nav navbar-right">
							<li> <img class="imgperfil img-circle" src="usuario.png"> </li>
				            <li> <a href="#contact">Cerrar Sesion</a></li>
			            	<li> <a href="#contact">Carrito</a></li>
			            	<li> <a href="#contact">Ajustes</a></li>
			           </ul>

			        </div>

			      </div>
			    </nav>

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
				
				<article class="row">

						<div class="col-lg-6 col-md-6 col-sm-6">
						  <img class= "imgPerfilVendedor img-circle" alt="img-perfil" src="ropa.jpg"> 
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							   <h1> NOMBRE DEL VENDEDOR</h1><br>
							   <h2>Fecha de Afiliacion: </h2> <br>
						</div>

				</article>

		<article class="row">
			<div>
				 <center> <h1>PRODUCTOS DE ESTE VENDEDOR</h1> </center> <br>
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


	</div>


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

		 <script src="js/jqueryfinal.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</body>

</html>