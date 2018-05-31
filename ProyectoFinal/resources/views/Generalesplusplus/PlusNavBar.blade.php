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
			           <img class="logo2 navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" src="../../logo.png">
			        </div>

			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav">
			          		<li> <img class="logohome" src="../../logo.png"> </li>
				            <li class="active"><a href="/principal">Inicio</a></li>
				            <li><a href="#about">Acerca de</a></li>
				            <li><a href="#contact">Contacto</a></li>
				            <li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departamentos <span class="caret"></span></a>
				              <ul class="dropdown-menu">
				                @if($departamentos)
					              	 @foreach($departamentos as $departamento)
						              	 @php
						              	 	$iddepa = $departamento->{'id-department'};
						              	 @endphp
						                	<li><a href="{{ url("/buscar/{$iddepa}") }}">{{$departamento->{'name-department'} }}</a></li>
					                @endforeach
				                 @endif
				              </ul>
				            </li>
			          </ul>

			           @php
			           $ruta = "../../fotografias/";
		               $variable= Session::get('Usuario')->{'image-user'};
		               $imagen = $ruta.$variable;

		               $iduser = Session::get('Usuario')->{'id-user'};
		               @endphp

			           <ul class="nav navbar-nav navbar-right">
							<li> 
									<img class="imgperfil img-circle" src="{{$imagen}}"> 
							</li>
							<li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
				              <ul class="dropdown-menu">


				              <li> <a href="{{ url("/Perfil/{$iduser}") }}">Ver Perfil</a></li>
				               <li> <a href="/nuevoproducto">Vender</a></li>
				               <li> <a href="/adminproducto">Administrar</a></li>
				               <li> <a href="/historial">Historial</a></li>
				              </ul>
				            </li>
				            <li> <a href="/usuario/logout">Cerrar Sesion</a></li>
			            	<li> <a href="/carrito">Carrito</a></li>
			            	<li> <a href="/ajustes">Ajustes</a></li>
			           </ul>

			        </div>

			      </div>
			    </nav>