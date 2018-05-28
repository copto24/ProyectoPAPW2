<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@include('Generalesplusplus.PlusHeadC')
	</head>

	<body class="fondo">

		@include('Generalesplusplus.PlusNavBar')

		@yield('content')
	  
	    @include('Generalesplusplus.PlusScripts')

	</body>

		@yield('scripts')

</html>