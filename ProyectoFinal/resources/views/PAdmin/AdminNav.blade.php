<nav class="navbar barra">
	      <div class="container-fluid">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed cuadro" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar linea"></span>
			            <span class="icon-bar linea"></span>
			            <span class="icon-bar linea"></span>
			          </button>
			           <img class="logo2 navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" src="/logo.png">
			        </div>

			        @php
			           $ruta = "../fad/";
		               $variable= Session::get('Administrador')->{'image-administrator'};
		               $imagen = $ruta.$variable;
	               @endphp

			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav">
			          		<li> <img class="logohome" src="/logo.png"> </li>
				            <li class="active"><a href="/adminadmin/reportes">Inicio</a></li>
				            <li class="active"><a href="/adminadmin/bloqueos">Bloqueos</a></li>
			          </ul>

			           <ul class="nav navbar-nav navbar-right">
							<li> <img class="imgperfil img-circle" src="{{$imagen}}"> </li>
				            <li> <a href="/adminadmin/logout">Cerrar Sesion</a></li>
			           </ul>

			        </div>

	      </div>
</nav>