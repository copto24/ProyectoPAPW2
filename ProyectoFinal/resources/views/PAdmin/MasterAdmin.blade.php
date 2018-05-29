<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generalesplus.PlusHeadC')
	</head>

	<body class="fondo">

		@include('PAdmin.AdminNav')

		@yield('content')
	  
	    @include('Generalesplus.PlusScripts')

	</body>

	@yield('scripts')

</html>