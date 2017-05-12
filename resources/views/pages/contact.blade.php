@extends('master')
@section('title', 'Contact')

@section('content')

  {{-- Open --}}

  <div class="content-mid">
    <h3>Contact Us</h3>
    <label class="line"></label>
  </div>
  <div class="contact-form">
    
    <div class="container">

      <div class="col-md-6 contact-left">

        <h3>LooMow Contact Details</h3>

        <div class="address">

          <div class="address-grid"><i class="glyphicon glyphicon-map-marker"></i>
            <div class="address1">
              <h3>Address</h3><p>Some Cool Address</p></div>
              <div class="clearfix"></div>
            </div>

            <div class=" address-grid "><i class="glyphicon glyphicon-phone"></i>
              <div class="address1"><h3>Phone:<h3><p>+123456789</p></div>
                <div class="clearfix"></div>
              </div>

              <div class=" address-grid "><i class="glyphicon glyphicon-envelope"></i>
                <div class="address1"><h3>Email:</h3><p>help@loomow.com</p></div>
                <div class="clearfix"></div>
              </div>

            </div>{{-- Close address --}}
          </div>{{-- Close contact-left --}}

          <div class="col-md-6 contact-top"><h3>Want to contact us?</h3>
            {!! Form::open(['url' => '/contact_us', 'method' => 'POST']) !!}
            <div>
              <span>Your Name </span><input type="text" name="name" required="">
            </div>
            <div>
              <span>Your Email </span><input type="text" name="email" required="">
            </div>
            <div>
              <span>Subject</span><input type="text" name="subject" required="">
            </div>
            <div>
              <span>Your Message</span><textarea name="message" required=""> </textarea>
            </div>
            <button class="btn btnColor btn-lg btn-rec" type="submit">Send</button>
            {!! Form::close() !!}
          </div>
          <div class="clearfix"></div>

        </div> {{-- Close container --}}

      </div> {{-- Close contact-form --}}

      {{-- Close --}}

    @endsection
