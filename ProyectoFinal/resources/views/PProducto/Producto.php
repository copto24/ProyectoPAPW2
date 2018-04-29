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


		<div class="container">
				
				<article class="row">

						<div class="col-lg-6 col-md-6 col-sm-12">
						  <img class= "img-responsive imagenproducto" alt="Miniatura" src="ropa.jpg"> 		
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							   <center> <h1> NOMBRE DEL PRODUCTO</h1> </center> <br>
							   <h2>PRECIO: </h2> <br>
							   <h2>VENDEDOR: </h2> <br>
							   <h2>AGREGAR AL CARRITO</h2> <br>
						</div>


					    <form>
						    <div class="form-group sinpadding col-lg-2 col-md-2 col-sm-2 col-xs-2">
						    	<select class="form-control">
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								</select>
						    </div>

					    	<div class="form-group sinpadding col-lg-1 col-md-1 col-sm-1 col-xs-1">
					    		<button type="submit" class="btn btn-success">Agregar</button>
					    	</div>
				    	</form>

				</article>

				<br>
				<center>
					<div class="form-row">
						    <form class="">
						    	<div class="form-group sinpadding col-lg-1 col-md-1 col-sm-1 col-xs-1">
						    		<img class="imgcomentario img-circle" src="usuario.png"> 
						    	</div>
						    	<div class="form-group sinpadding col-lg-10 col-md-10 col-sm-10 col-xs-10">
						    		<input class="form-control" type="text" placeholder="Comentario">
						    	</div>

						    	<div class="form-group sinpadding col-lg-1 col-md-1 col-sm-1 col-xs-1">
						    		<button type="button" class="btn btn-success">Comentar</button>
						    	</div>
					    	</form>
					    	<br>
					</div>

					<h2>COMENTARIOS DEL PRODUCTO</h2>

					<div class="row">
				    		<div class="sinpadding col-lg-2 col-md-2 col-sm-1 col-xs-2">
						    		<img class="imgcomentario img-circle" src="usuario.png"> 
					    	</div>
					    	<div class="sinpadding col-lg-10 col-md-10 col-sm-11 col-xs-10">
					    		<input class="form-control" type="text" readonly="true" placeholder="este es un comentario de prueba">
					    	</div>
					</div>

					<div class="row">
				    		<div class="sinpadding col-lg-2 col-md-2 col-sm-1 col-xs-2">
						    		<img class="imgcomentario img-circle" src="usuario.png"> 
					    	</div>
					    	<div class="sinpadding col-lg-10 col-md-10 col-sm-11 col-xs-10">
					    		<input class="form-control" type="text" readonly="true" placeholder="este es un comentario de prueba">
					    	</div>
					</div>

					<div class="row">
				    		<div class="sinpadding col-lg-2 col-md-2 col-sm-1 col-xs-2">
						    		<img class="imgcomentario img-circle" src="usuario.png"> 
					    	</div>
					    	<div class="sinpadding col-lg-10 col-md-10 col-sm-11 col-xs-10">
					    		<input class="form-control" type="text" readonly="true" placeholder="este es un comentario de prueba">
					    	</div>
					</div>
					<br>

				</center>

	</div>


	<footer class="footer">
	    
	</footer>

		<script src="js/jqueryfinal.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	</body>

</html>