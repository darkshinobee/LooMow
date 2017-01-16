<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	@include('partials._jtron')
	@include('partials._nav')
	@yield('content')
<footer class="container-fluid text-center">
		@include('partials._footer')
</footer>
</body>
</html>