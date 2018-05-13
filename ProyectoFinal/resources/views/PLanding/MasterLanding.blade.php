<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('PLanding.navbar')

		@yield('content')
	  
	    @include('Generales.GeneralScripts')

	</body>

</html>