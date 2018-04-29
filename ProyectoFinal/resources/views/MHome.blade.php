<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('Generales.NavBar')
		@include('PHome.HomeC')
	  
	    @include('Generales.GeneralScripts')

	</body>

</html>