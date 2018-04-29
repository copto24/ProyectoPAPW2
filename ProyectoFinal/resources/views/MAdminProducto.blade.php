<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('Generales.NavBar')
		@include('PAdminProducto.AdminProductoC')
	  
	    @include('Generales.GeneralScripts')

	</body>

</html>