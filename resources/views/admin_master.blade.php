<!DOCTYPE html>
<html lang="en">
<head>
	@php
		$admin = Auth::guard('admin')->user()
	@endphp
	@include('admin_partials._head')
</head>
<body>
	<div id="wrapper">
		@include('admin_partials._nav')
		<div id="page-wrapper">
			<div class="container-fluid">
				@include('admin_partials._sidebar')
				<div class="col-md-8 col-md-offset-2 text-center">
					@include('partials._prompts')
				</div>
				<div class="clearfix"></div>
				@yield('content')
				<footer>
					@include('admin_partials._footer')
					@include('admin_partials._scripts')
				</footer>
			</div>
		</div>
	</div>
</body>
</html>
