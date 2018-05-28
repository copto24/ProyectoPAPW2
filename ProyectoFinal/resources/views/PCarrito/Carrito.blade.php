@extends('PCarrito.MasterCarrito')
@section('title', 'Carrito')

@php
	$message=Session::get('message');
	$idusuario = Session::get('Usuario')->{'id-user'};
@endphp

@section('content')
<div class="container-fluid">

			<center>
				<div>
					<h2>CARRITO DE COMPRAS</h2>
				</div>
			</center>

		<div class="row">
			<center>
			<b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Imagen </b>
			<b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Nombre </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Precio </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Cantidad </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> Subtotal </b>
		    <b class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito"> </b>
		    </center>
		</div>
		@if($carritos)
		@foreach($carritos as $carrito)
	    	@php
	    		$idproducto = $carrito->{'id-cart'};
	    		$rutap = "imgproductos/";
			  	$variablep= $carrito->{'image-product'};
			   	$imagenp = $rutap.$variablep;
			   	$preciopr = $carrito->{'price-product'};
                $cantpr = $carrito->{'amount-cart'};
                $subtotal = $preciopr * $cantpr;
	        @endphp
			<div class="row">
				<img class= "img-responsive col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito" alt="imagen" src="{{$imagenp}}">
				<h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv">{{$carrito->{'name-product'} }}</h4>
			    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv">${{$carrito->{'price-product'} }}</h4>
			    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv">{{$carrito->{'amount-cart'} }}</h4>
			    <h4 class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sinpaddingcarrito centrartextodiv">${{$subtotal}}</h4>
		    	<form action="carrito/eliminar" method="POST" class="quitarcarrito">
			      	{{ csrf_field() }}
			      	<input name="_method" type="hidden" value="DELETE">
			    	<input type="hidden" name="idproducto" value="{{$carrito->{'id-cart'} }}">
			    	 <button type="submit" class="btn btn-success sinpaddingcarrito col-lg-2 col-md-2 col-sm-2 col-xs-2">Quitar
			    	 	</button>
			    </form>
			</div>
		@endforeach
		@endif

		<div>
			<center> {!!$carritos->render()!!}</center>
		</div>

		<div class="row">
			<center>
				<h2>TOTAL: ${{$total}}</h2>
				<form action="carrito/comprar" method="POST">
			      	{{ csrf_field() }}
			      	<input type="hidden" name="idusuario" value="{{$idusuario}}">
					<button type="submit" class="btn btn-success">COMPRAR ARTICULOS</button>
				</form>
			</center>
		</div>

	</div>
	
	<br>

@endsection

@section('scripts')

		@if($message == '1') 
	    	<script> alert("Producto eliminado del carrito."); </script> 
	    @elseif($message == '2') 
	    	<script> alert("No hay nada que comprar."); </script>
	    @endif

		<script type="text/javascript">
		 </script>
@endsection