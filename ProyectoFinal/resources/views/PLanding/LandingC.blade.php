
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

		        <aside class="col-xs-12 col-sm-6 col-md-5 registro"> 
			        	<form>
			        		<label>¿Eres nuevo? Registrate aqu&iacute.</label>

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

			        		<button type="submit" class="btn btn-primary">Crear cuenta</button>
			        		
			        	</form>
			        	<br>
		        </aside>

		        
	    	</div>
	    </div>