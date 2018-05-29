@extends('PAdmin.MasterAdminCrear')
@section('title', 'AdminCrear')

@php
	$message=Session::get('message');
@endphp

@section('content')
    	<form action="/adminadmin" method="POST" accept-charset="UTF-8" files=”true”  enctype="multipart/form-data" onsubmit="return validacion()">
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
	    	<script> alert("El correo ya existe."); </script> 
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

	    </script>
		
@endsection