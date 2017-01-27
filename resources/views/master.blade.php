<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	@include('partials._jtron')
	@include('partials._nav')
	<div class="container">
		@include('partials._search')
		<div class="row">
			<div class="col-sm-10">
				@yield('content')
			</div>
			@include('partials._sidebar')
		</div>
	</div>
	<br>
	<footer class="container-fluid text-center">
		@include('partials._footer')
		@include('partials._scripts')
	</footer>
</body>
</html>