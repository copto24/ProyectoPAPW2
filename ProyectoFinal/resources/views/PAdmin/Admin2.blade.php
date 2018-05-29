@extends('PAdmin.MasterAdmin')
@section('title', 'Admin2')

@php
	$message=Session::get('message');
	if (isset($_GET["page"])){
		$contador = 0;
		$pagina = $_GET["page"];
		for ($i=1; $i < $pagina; $i++) { 
			$contador = $contador + 8;
		}
	}else{
		$contador = 0;
	}
@endphp

@section('content')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h1>PANEL DE ADMINISTRADOR</h1>
					<h2>TABLA DE BLOQUEOS</h2>
				</center>
				
			

				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

						<table class="table table-striped">
							  
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Administrador</th>
							      <th scope="col">Bloqueado</th>
							      <th scope="col">Causa</th>
							      <th scope="col">Desbloquear</th>
							    </tr>
							 
							  <tbody>
							  	@if($bloqueos)
								@foreach($bloqueos as $bloqueo)
								@php		
						        		$contador = $contador + 1;
						        @endphp
								    <tr>
								      <th scope="row">{{$contador}}</th>
								       <form action="/adminadmin/desbloquear" method="POST" class="form=group">
								      	{{ csrf_field() }}
								      	<input name="_method" type="hidden" value="DELETE">
								      	<input type="hidden" name="idbloqueo" value="{{$bloqueo->{'id-bloqued'} }}">
									      <td> <input class="form-control" type="text" readonly="true" name="" value="{{$bloqueo->{'first-name-administrator'} }} {{$bloqueo->{'last-name-administrator'} }}"> </td>
									      <td> <input class="form-control" type="text" readonly="true" name="" value="{{$bloqueo->{'first-name-user'} }} {{$bloqueo->{'last-name-user'} }}"> </td>
									      <td> <input class="form-control" type="text" readonly="true" name="" value="{{$bloqueo->{'name-reason'} }}"> </td>
									      <td>  
										      <center>
										      	  <button type="submint" class="btn btn-primary">Desbloquear</button>
										      </center>
									   	  </td>
								       </form>
								    </tr>
								@endforeach
								@endif

							  </tbody>
							</table>
		        </article>     
		</div>

	</div>


@endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("Usuario desbloqueado."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("El correo ya exite, escoga otro."); </script>
	    @endif

	  
		
@endsection