@extends('PAjustes.MasterAjustes')
@section('title', 'Ajustes')
@section('content')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h2>AJUSTES DE USUARIO</h2>
				</center>

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
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

		        	<form action="/ajustes" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
			        		{{ csrf_field() }}

				        		<label>Datos</label>

				        		<div class="form-group">
				        		<label>Nombre:</label>
				        		@php
				        			$nombre = Session::get('Usuario')->{'first-name-user'};
				        		@endphp
				        		<input class="form-control" id="nombre" name="nombre" type="text" required  placeholder="Nombre:" value="{{$nombre}}">
				        		
			        		</div>

			        		<div class="form-group">
				        		<label>Apellido:</label>
				        		@php
				        			$apellido = Session::get('Usuario')->{'last-name-user'};
				        		@endphp
				        		<input class="form-control" id="apellido" name="apellido" type="text" required placeholder="Apellido:" value="{{$apellido}}">
			        		</div>

			        		<div class="form-group">
				        		<label>Fecha de Nacimiento:</label>
				        		@php
				        			$fecha = Session::get('Usuario')->{'birthdate-user'};
				        		@endphp
				        		<input class="form-control" name="fecha" type="date" required max={{date("Y-m-d")}} min="1940-01-01" value={{date("Y-m-d")}} value="{{$fecha}}">
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
				        		@php
				        			$correo = Session::get('Usuario')->{'email-user'};
				        		@endphp
				        		<input class="form-control" id="correo" name="correo" type="email" required placeholder="Correo:" value="{{$correo}}">
			        		</div>

			        		<div class="form-group">
				        		<label>Contrase&ntildea:</label>
				        		@php
				        			$contra = Session::get('Usuario')->{'password-user'};
				        		@endphp
				        		<input class="form-control" id="contra" name="contra" type="password" required placeholder="Contraseña:" value="{{$contra}}">
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
		        </article>     
		</div>


	<footer class="">
	    	
	</footer>

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