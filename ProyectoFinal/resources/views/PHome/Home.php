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

		        <div class="carrusel sinpadding col-xs-12">
					      <div id="carousel-example-generic" class="carousel slide carruselhome" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarrusel" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarrusel" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarrusel" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
							</div>
					</div>

		</div> <!-- CONTAINER FLUID -->

		<div class="container">
			<div class="main row">

				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep1" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep1" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep1" data-slide-to="1"></li>
					          <li data-target="#carouselDep1" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					           <a href="www.google.com"> <img class="imgcarruselDep" src="logo.png" alt="First slide"> </a>
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>

					        </div>
					        <a class="left carousel-control" href="#carouselDep1" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep1" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
					<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep2" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep2" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep2" data-slide-to="1"></li>
					          <li data-target="#carouselDep2" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep2" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep2" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep3" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep3" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep3" data-slide-to="1"></li>
					          <li data-target="#carouselDep3" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep3" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep3" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>

				<article class="col-xs-12">
				<h1> DEPARTAMENTO DE ROPA</h1>
					<div class="carrusel sinpadding col-xs-12">
					      <div id="carouselDep4" class="carousel slide carruselDep" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carouselDep4" data-slide-to="0" class="active"></li>
					          <li data-target="#carouselDep4" data-slide-to="1"></li>
					          <li data-target="#carouselDep4" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img class="imgcarruselDep" src="logo.png" alt="First slide">
					          </div>
					    
					          <div class="item">
					             <img class="imgcarruselDep" src="img2.png" alt="First slide">
					          </div>

					          <div class="item">
					            <img class="imgcarruselDep" src="img3.png" alt="First slide">
					          </div>
					        </div>
					        <a class="left carousel-control" href="#carouselDep4" role="button" data-slide="prev">
					          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					          <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselDep4" role="button" data-slide="next">
					          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					          <span class="sr-only">Next</span>
					        </a>
				</div>
				</article>
			</div> <!--MAIN ROW -->

	    </div> <!--CONTAINER -->

	    <footer class="footerhome">
	    	<h2>PIE DE PAGINA</h2>
	    </footer>

	    <script src="js/jqueryfinal.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	</body>

</html>