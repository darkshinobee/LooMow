@extends('master')
@section('title', 'Contact')

@section('content')

{{-- Open --}}


<div class="contact-form">

  <div class="container">

    <div class="col-md-6 contact-left">

      <h3>Can't think of some text to put here, so here goes! </h3>
      <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas. </p>


      <div class="address">

        <div class="address-grid"><i class="glyphicon glyphicon-map-marker"></i>
          <div class="address1">
            <h3>Address</h3><p>Some Cool Address</p></div>
          <div class="clearfix"></div>
        </div>

        <div class=" address-grid "><i class="glyphicon glyphicon-phone"></i>
          <div class="address1"><h3>Our Phone:<h3><p>+123456789</p></div>
          <div class="clearfix"></div>
        </div>

        <div class=" address-grid "><i class="glyphicon glyphicon-envelope"></i>
          <div class="address1"><h3>Email:</h3><p><a href="mailto:info@example.com"> help@loomow.com</a></p></div>
          <div class="clearfix"> </div>
        </div>

        <div class=" address-grid "><i class="glyphicon glyphicon-bell"></i>
          <div class="address1"><h3>Open Hours:</h3><p>Monday-Friday, 9AM-5PM</p></div>
          <div class="clearfix"> </div>
        </div>

      </div>{{-- Close address --}}
    </div>{{-- Close contact-left --}}

    <div class="col-md-6 contact-top"><h3>Want to contact us?</h3>
        <form>
        <div>
            <span>Your Name </span><input type="text" value="" >
        </div>
          <div>
            <span>Your Email </span><input type="text" value="" >
          </div>
          <div>
            <span>Subject</span><input type="text" value="" >
          </div>
          <div>
            <span>Your Message</span><textarea> </textarea>
          </div>
          <button class="btn btn-primary btn-lg btn-rec">Send</button>
        </form>
    </div>
    <div class="clearfix"></div>

  </div> {{-- Close container --}}

</div> {{-- Close contact-form --}}

{{-- Close --}}

@endsection
