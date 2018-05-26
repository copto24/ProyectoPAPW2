<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('PPerfil.PerfilHeadC')
	</head>

	<body class="fondo">

		@include('PPerfil.PerfilNavBar')

		@yield('content')
	  
	    @include('PPerfil.PerfilScripts')

	</body>

	@yield('scripts')

</html>