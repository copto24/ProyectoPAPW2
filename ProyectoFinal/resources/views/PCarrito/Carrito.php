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

			<center>
				<div>
					<h2>CARRITO DE COMPRAS</h2>
				</div>
			</center>

		<div class="row">
			<center>
			<b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Imagen </b>
			<b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Nombre </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Precio </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Cantidad </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Subtotal </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> </b>
		    </center>
		</div>

		<div class="row">
			<img class= "img-responsive col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito" alt="imagen" src="ropa.jpg">
			<h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> Producto1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> 1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <form class="quitarcarrito">
		    	<input type="hidden" name="idproducto">
		    	 <button type="submit" class="btn btn-success sinpaddingcarrito col-lg-2 col-md-2 col-sm-2 col-xs-2">Quitar
		    	 	</button>
		    </form>
		</div>

		<div class="row">
			<img class= "img-responsive col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito" alt="imagen" src="ropa.jpg">
			<h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> Producto1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> 1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <form class="quitarcarrito">
		    	<input type="hidden" name="idproducto">
		    	 <button type="submit" class="btn btn-success sinpaddingcarrito col-lg-2 col-md-2 col-sm-2 col-xs-2">Quitar
		    	 	</button>
		    </form>
		</div>

		<div class="row">
			<img class= "img-responsive col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito" alt="imagen" src="ropa.jpg">
			<h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> Producto1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> 1 </h4>
		    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv"> $50 </h4>
		    <form class="quitarcarrito">
		    	<input type="hidden" name="idproducto">
		    	 <button type="submit" class="btn btn-success sinpaddingcarrito col-lg-2 col-md-2 col-sm-2 col-xs-2">Quitar
		    	 	</button>
		    </form>
		</div>

		<div class="row">
			<center>
				<h2>TOTAL: $150 </h2>
				<form>
					<button type="submit" class="btn btn-success">COMPRAR ARTICULOS</button>
				</form>
			</center>
		</div>

	</div>
	
	<br>

	<footer>
	   
	</footer>

		<script src="js/jqueryfinal.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	</body>

</html>