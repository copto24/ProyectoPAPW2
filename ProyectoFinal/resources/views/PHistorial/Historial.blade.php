@extends('PHistorial.MasterHistorial')
@section('title', 'Historial')

@php
	$message=Session::get('message');
	if (isset($_GET["page"])){
		$contador = 0;
		$pagina = $_GET["page"];
		for ($i=1; $i < $pagina; $i++) { 
			$contador = $contador + 10;
		}
	}else{
		$contador = 0;
	}
@endphp

@section('contenido')
<div class="container">

				<div class="main row centrarajustes">

				<center>
					<h1>HISTORIAL DE COMPRAS</h1>
				</center>
				
				<article class="col-xs-12 col-sm-12 col-md-12 login sinpadding">

						<table class="table table-striped">
							  
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Producto</th>
							      <th scope="col">Cantidad</th>
							      <th scope="col">Total</th>
							    </tr>
							 
							  <tbody>
							  	@if($histos)
							  	@foreach($histos as $histo)
							  	 	@php		
							        		$contador = $contador + 1;
							        		$cantidadhisto = $histo->{'amount-purchase'};
							        		$preciohisto =	$histo->{'price-purchase'};
							        		$totalhisto = $cantidadhisto * $preciohisto;
							        @endphp
							    <tr>
							      <th scope="row">{{$contador}}</th>
							      <form class="form=group">
								      <td> <input class="form-control" type="text" readonly="true" name="" value="{{$histo->{'name-product'} }}"> </td>
								      <td> <input class="form-control" type="text" readonly="true" name="" value="{{$histo->{'amount-purchase'} }}"> </td>
								      <td> <input class="form-control" type="text" readonly="true" name="" value="${{$totalhisto}}"> </td>
							       </form>
							    </tr>
							    @endforeach
								@endif

							  </tbody>
							</table>
		        </article>     
		</div>
		<div>
			<center> {!!$histos->render()!!}</center>
		</div>
	</div>

@endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("Productos comprados."); </script> 
	    @endif

		<script type="text/javascript">
		 </script>
@endsection