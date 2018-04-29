<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('PLanding.navbar')
		@include('PLanding.LandingC')
	  
	    @include('Generales.GeneralScripts')

	</body>

</html>