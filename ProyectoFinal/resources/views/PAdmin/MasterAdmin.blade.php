<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generales.HeadC')
	</head>

	<body class="fondo">

		@include('PAdmin.AdminNav')

		@yield('content')
	  
	    @include('Generales.GeneralScripts')

	</body>

	@yield('scripts')

</html>