<div class="footer">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
			<div class="col-md-4 footer-middle-in">
				<a href="#"><img src="/images/logos/footer_logo2.png" alt="LooMow Logo"></a>
				</div>

			<div class="col-md-4 footer-middle-in">
				<h6>Information</h6>
				<ul class="in">
					<li><a href="/about">About</a></li>
					<li><a href="/contact">Contact Us</a></li>
					<li><a href="#">Returns</a></li>
					<li><a href="#">Terms and Conditions</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 footer-middle-in">
				<h6>Newsletter</h6>
				<span>Sign up for News Letter</span>
				{!! Form::open(['url' => '/subscribe', 'method' => 'POST']) !!}
				{{ csrf_field() }}
					<input type="text" name="email" placeholder="Enter your E-mail Address">
					<input type="submit" value="Subscribe">
				{!! Form::close() !!}
			</div>
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<p class="footer-class">&copy; 2017 LGX. All Rights Reserved</p>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
