@extends('PAjustes.MasterAjustes')
@section('title', 'Ajustes')

@php
	$message=Session::get('message');
	$nombre = Session::get('Usuario')->{'first-name-user'};
	$apellido = Session::get('Usuario')->{'last-name-user'};
	$fecha = Session::get('Usuario')->{'birthdate-user'};
	$correo = Session::get('Usuario')->{'email-user'};
	$genero = Session::get('Usuario')->{'gender-user'};
@endphp

@section('content')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h2>AJUSTES DE USUARIO</h2>
				</center>
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">
		        	<form action="/usuario/update" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
			        		{{ csrf_field() }}

				        		<label>Datos</label>

				        		<div class="form-group">
				        		<label>Nombre:</label>
				        		<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre:" value="{{$nombre}}">
				        		
			        			</div>

			        		<div class="form-group">
				        		<label>Apellido:</label>
				        		<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido:" value="{{$apellido}}">
			        		</div>

			        		<div class="form-group">
				        		<label>Fecha de Nacimiento:</label>
				        		<input class="form-control" name="fecha" type="date" max={{date("Y-m-d")}} min="1940-01-01"  value="{{$fecha}}">
			        		</div>

				        	<div class="form-group">
				        		<label>Pais:</label>
				        		<select class="form-control" name="pais">
				        			@if($paises)
								  		@foreach($paises as $pais)
								  			{<option value={{$pais->{'id-country'} }}
								  			@php
								  				if(Session::get('Usuario')->{'id-country'} == $pais->{'id-country'}){
											@endphp
												selected 
								  			@php		
								  				}
								  			@endphp
								  			>{{$pais->{'name-country'} }} </option>}
								  		@endforeach
								  	@endif
								</select>
							</div>

			        		<div class="form-group">
				        		<label >Correo:</label>
				        		<input class="form-control" id="correo" name="correo" type="email" required placeholder="Correo:" value="{{$correo}}">
			        		</div>

			        		<div class="form-group">
				        		<label>Contrase&ntildea:</label>
				        		<input class="form-control" id="contra" name="contra" type="password" placeholder="Contraseña:" value="">
			        		</div>

			        		<div class="form-group">
				        		<label>Selecciona una imagen:</label>
				        		<input class="form-control" type="file" id="foto" name="foto" onchange="return fileValidation()">
			        		</div>
			        		
			        		<label>G&eacutenero:</label>
			        		<div class="radio">
								@php
				        			if($genero == 0){
				        		@endphp
					        		<label><input type="radio" name="optradio" checked="checked" value="0">Hombre</label>
								  	<label><input type="radio" name="optradio" value="1">Mujer</label>
				        		@php
				        			}elseif($genero == 1){
				        		@endphp
				        			<label><input type="radio" name="optradio" value="0">Hombre</label>
								  	<label><input type="radio" name="optradio" checked="checked" value="1">Mujer</label>
				        		@php
				        			}
				        		@endphp
							</div>

			        		<button type="submit" class="btn btn-primary">Modificar</button>

			        	</form>
		        	<br>
		        </article>     
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
	    	<script> alert("La contraseña debe tener 3 caracteres minimo."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("El correo ya exite, escoga otro."); </script>
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
				}else if(nombretexto == null || /^\s+$/.test(nombretexto) || tiene_numeros(nombretexto)){
					alert('El nombre es un dato invalido');
					return false;
				}else if(apellidotexto == null || /^\s+$/.test(apellidotexto) || tiene_numeros(apellidotexto)){
					alert('El apellido es un dato invalido');
					return false;
				}else if(contratexto == null || /^\s+$/.test(contratexto)){
					alert('La contraseña es un dato invalido');
					return false;
				}else {
					return true;
				}

			}

			
	    </script>
		
	@endsection