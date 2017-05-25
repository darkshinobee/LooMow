<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			@include('partials._nav')
			</div>
			<div class="row">
			<div class="clearfix"></div>
			@include('partials._banner')
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2 text-center">
		@include('partials._prompts')
	</div>
	<div class="clearfix"></div>
	@yield('content')
</div>
</body>
<footer>
	@include('partials._footer')
	@include('partials._scripts')
	@yield('scripts')
</footer>
</html>
