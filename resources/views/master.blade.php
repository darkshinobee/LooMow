<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	<div id="app">
		@include('partials._nav')
		@include('partials._banner')
		<div class="col-md-8 col-md-offset-2 text-center">
			@include('partials._prompts')
		</div>
		<div class="clearfix"></div>
		@yield('content')
		<footer>
			@include('partials._footer')
			@include('partials._scripts')
		</footer>
	</div>
</body>
</html>
