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


			<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h2>AJUSTES DE USUARIO</h2>
				</center>
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

		        	<form>
				        		<label>Datos</label>

				        		<div class="form-group">
					        		<label>Nombre:</label>
					        		<input class="form-control" type="text" required="true" placeholder="Nombre:">
				        		</div>

				        		<div class="form-group">
					        		<label>Fecha de Nacimiento:</label>
					        		<input class="form-control" required="true" type="date">
				        		</div>

				        		<div class="form-group">
					        		<label>Correo:</label>
					        		<input class="form-control" type="email" required="true" placeholder="Correo:">
				        		</div>

				        		<div class="form-group">
					        		<label>Contrase&ntildea:</label>
					        		<input class="form-control" type="password" required="true" placeholder="Contraseña:">
				        		</div>

				        		<div class="form-group">
					        		<label>Selecciona una imagen:</label>
					        		<input class="form-control" required="true" type="file">
				        		</div>
				        		
				        		<label>G&eacutenero:</label>
				        		<div class="radio">
								  <label><input type="radio" name="optradio" checked="checked" >Hombre</label>
								  <label><input type="radio" name="optradio">Mujer</label>
								</div>

				        		<button type="submint" class="btn btn-primary">Guardar Cambios</button>

			        	</form>
		        	<br>
		        </article>     
		</div>
	</div>

	<footer class="footerajustes">
	    	<h2>PIE DE PAGINA</h2>
	</footer>

		 <script src="js/jqueryfinal.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	</body>

</html>