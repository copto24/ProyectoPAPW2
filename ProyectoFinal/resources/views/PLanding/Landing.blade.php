@extends('PLanding.MasterLanding')
@section('title', 'Landing')
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

		        	<form>
			        		<label>LOGIN</label>

			        		<div class="form-group">
				        		<label>Correo:</label>
				        		<input class="form-control" type="email" required="true" placeholder="Correo:">
			        		</div>

			        		<div class="form-group">
				        		<label>Contrase&ntildea:</label>
				        		<input class="form-control" type="password" required="true" placeholder="Contraseña:">
			        		</div>

			        		<button type="submit" class="btn btn-success">Entrar</button>
			        	</form>
			        	<br>
		        </article>

	@if(count($errors) > 0)
	@foreach($errors->all() as $error)
	@endforeach
		<script>
			alert("ERRORES.\n"+
				@foreach($errors->all() as $error)
				"{{$error}}\n"+
				@endforeach"");
		</script>
	@endif


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
	    <script type="text/javascript">
	    	function fileValidation(){
			    var fileInput = document.getElementById('foto');
			    var filePath = fileInput.value;
			    if(!allowedExtensions.exec(filePath)){
			        alert('Solo pueden subirse imagenes jpg y png.');
				      	fileInput.value = '';
				        return false;			        
				}
			    
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
				}else if(nombretexto == null || nombretexto.length == 0 || /^\s+$/.test(nombretexto)){
					alert('El nombre es un dato invalido');
					return false;
				}else if(apellidotexto == null || apellidotexto.length == 0 || /^\s+$/.test(apellidotexto)){
					alert('El apellido es un dato invalido');
					return false;
				}else if(contratexto == null || contratexto.length == 0 || /^\s+$/.test(contratexto)){
					alert('La contraseña es un dato invalido');
					return false;
				}else {
					return true;
				}

			}
	    </script>
		
	    @endsection