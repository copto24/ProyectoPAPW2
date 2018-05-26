@extends('PLanding.MasterLanding')
@section('title', 'Landing')

@php
	$message=Session::get('message');
@endphp

@section('content')
<!--Formularios de login y registro-->
	    <div class="container-fluid">
	    	<!--Carrusel de imagenes-->
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

<div class="container">
	    	<div>
		        <article class="col-xs-12 col-sm-6 col-md-7 login">

		        	<form action="/usuario/login" method="POST" accept-charset="UTF-8" onsubmit="return validarLogin()">
		        	{{ csrf_field() }}
			        		<label>LOGIN</label>

			        		<div class="form-group">
				        		<label>Correo:</label>
				        		<input class="form-control" id="correologin" name="correo" type="email" required placeholder="Correo:">
			        		</div>

			        		<div class="form-group">
				        		<label>Contrase&ntildea:</label>
				        		<input class="form-control" id="contralogin" name="contra" type="password" required="true" placeholder="Contraseña:">
			        		</div>

			        		<button type="submit" class="btn btn-success">Entrar</button>
			        	</form>
			        	<br>
		        </article>

		        <aside class="col-xs-12 col-sm-6 col-md-5 registro" > 
			        	<form action="/usuario" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
			        		{{ csrf_field() }}
			        		<label>¿Eres nuevo? Registrate aqu&iacute.</label>

			        		<div class="form-group">
				        		<label>Nombre:</label>
				        		<input class="form-control" id="nombre" name="nombre" type="text" required  placeholder="Nombre:">
				        		
			        		</div>

			        		<div class="form-group">
				        		<label>Apellido:</label>
				        		<input class="form-control" id="apellido" name="apellido" type="text" required placeholder="Apellido:">
			        		</div>

			        		<div class="form-group">
				        		<label>Fecha de Nacimiento:</label>
				        		<input class="form-control" name="fecha" type="date" required max={{date("Y-m-d")}} min="1940-01-01" value={{date("Y-m-d")}}>
			        		</div>

				        	<div class="form-group">
				        		<label>Pais:</label>
				        		<select class="form-control" name="pais">
				        			@if($paises)
								  		@foreach($paises as $pais)
								  			{<option value={{$pais->{'id-country'} }}> {{$pais->{'name-country'} }} </option>}
								  		@endforeach
								  	@endif
								</select>
							</div>

			        		<div class="form-group">
				        		<label >Correo:</label>
				        		<input class="form-control" id="correo" name="correo" type="email" required placeholder="Correo:">
			        		</div>

			        		<div class="form-group">
				        		<label>Contrase&ntildea:</label>
				        		<input class="form-control" id="contra" name="contra" type="password" required placeholder="Contraseña:">
			        		</div>

			        		<div class="form-group">
				        		<label>Selecciona una imagen:</label>
				        		<input class="form-control" required type="file" id="foto" name="foto" onchange="return fileValidation()">
			        		</div>
			        		
			        		<label>G&eacutenero:</label>
			        		<div class="radio">
							  <label><input type="radio" name="optradio" checked="checked" value="0">Hombre</label>
							  <label><input type="radio" name="optradio" value="1">Mujer</label>
							</div>

			        		<button type="submit" class="btn btn-primary">Crear cuenta</button>
			        		
			        	</form>
			        	<br>
		        </aside>

		        
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
	    	<script> alert("Usuario Agregado Correctamente."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("Datos incorrectos."); </script>
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

			function tiene_numeros(texto){
				var numeros="0123456789";
			   	for(i=0; i<texto.length; i++){
			      	if (numeros.indexOf(texto.charAt(i),0)!=-1){
			         	return true;
			      	}
			  	}
			   return false;
			}

			function validacion(){
				var emailtexto = document.getElementById(correo.id).value;
				var nombretexto = document.getElementById(nombre.id).value;
				var apellidotexto = document.getElementById(apellido.id).value;
				var contratexto = document.getElementById(contra.id).value;

				var emailregex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

				if (!emailregex.test(emailtexto)) {
				    alert('El correo electronico es invalido');
    				return false;
				}else if(nombretexto == null || nombretexto.length == 0 || /^\s+$/.test(nombretexto) || tiene_numeros(nombretexto)){
					alert('El nombre es un dato invalido');
					return false;
				}else if(apellidotexto == null || apellidotexto.length == 0 || /^\s+$/.test(apellidotexto) || tiene_numeros(apellidotexto)){
					alert('El apellido es un dato invalido');
					return false;
				}else if(contratexto == null || contratexto.length == 0 || /^\s+$/.test(contratexto)){
					alert('La contraseña es un dato invalido');
					return false;
				}else {
					return true;
				}

			}

			function validarLogin(){
				var correotext = document.getElementById(correologin.id).value;
				var contratext = document.getElementById(contralogin.id).value;

				var emailregex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

				if (!emailregex.test(correotext)) {
				    alert('El correo electronico es invalido');
    				return false;
				}else if(contratext == null || contratext.length == 0 || /^\s+$/.test(contratext)){
					alert('La contraseña es un dato invalido');
					return false;
				}else {
					return true;
				}

			}
	    </script>
		
	    @endsection
