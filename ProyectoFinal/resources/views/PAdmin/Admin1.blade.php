@extends('PAdmin.MasterAdmin')
@section('title', 'Admin')

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
					<h2>TABLA DE REPORTES</h2>
				</center>
				
			

				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

						<table class="table table-striped">
							  
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Reportante</th>
							      <th scope="col">Causa</th>
							      <th scope="col">Publicacion</th>
							      <th scope="col">Bloquear</th>
							    </tr>
							 
							  <tbody>

							  	@if($reportes)
								@foreach($reportes as $reporte)
									@php		
							        		$contador = $contador + 1;
							        @endphp
							  		<tr>
								      <th scope="row">{{$contador}}</th>
								      <form action="/adminadmin/bloquear" method="POST" class="form=group">
								      	{{ csrf_field() }}
								      	<input name="_method" type="hidden" value="PUT">
								      	<input type="hidden" name="idusuarioA" value="{{$reporte->Acusado }}">
								      	<input type="hidden" name="idusuarioR" value="{{$reporte->Reportante }}">
								      	<input type="hidden" name="idproducto" value="{{$reporte->IDProducto }}">
								      	<input type="hidden" name="idrazon" value="{{$reporte->IDRazon }}">
									      <td> <input class="form-control" type="text" readonly="true" name="nombre" value="{{$reporte->Primer }} {{$reporte->Ultimo }}"> </td>
									      <td> <input class="form-control" type="text" readonly="true" name="razon" value="{{$reporte->Razon }}"> </td>
									      <td> <input class="form-control" type="text" readonly="true" name="producto" value="{{$reporte->Producto }}"> </td>
									      <td>  
										     <center>
										      	  <button type="submint" class="btn btn-primary">Bloquear</button>
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
		<center> {!!$reportes->render()!!}</center>
	</div>

	 @endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("Usuario bloqueado."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("El correo ya exite, escoga otro."); </script>
	    @endif

	  
		
	@endsection