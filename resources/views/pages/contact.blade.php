@extends('master')
@section('title', 'Contact Us')

@section('content')
<h1>Contact Us</h1>
<hr>
<form>
	<div class="form-group">
		<label name="name">Full Name:</label>
		<input id="name" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label name="email">Email:</label>
		<input id="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label name="subject">Subject:</label>
		<input id="Subject" name="Subject" class="form-control">
	</div>
	<div class="form-group">
		<label name="message">Message:</label>
		<textarea id="message" name="message" class="form-control" 
		placeholder="Type your message here..."></textarea>
	</div>
	<input type="submit" value="Send Message" class="btn btn-primary">
</form>
@stop