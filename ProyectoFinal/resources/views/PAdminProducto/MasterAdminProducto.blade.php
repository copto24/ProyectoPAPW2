<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('Generales.NavBar')

		@yield('content')
	  
	    @include('Generales.GeneralScripts')

	</body>

		@yield('scripts')

</html>