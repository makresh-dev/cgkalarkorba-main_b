@extends('frontend.layouts.app')

@section('title', 'सम्पर्क')

@section('content')
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236192.2884055907!2d82.60675608274093!3d22.33457159828632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a278f26de2eba65%3A0x3048cc6dcbdadff4!2sKorba%2C%20Chhattisgarh!5e0!3m2!1sen!2sin!4v1606835402171!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <!-- <div class="row mt-5"> -->

          <div class="row mt-0">

            <div class="col-lg-4" style="margin-top: 40px;">
              <div class="info">
                <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>Korba, Chhattisgarh, India </p>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="info">
                <div class="email">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>Cgkorbakalar@gmail.com ,</p>
                  <p>bdadsena1@gmail.com</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="info">
                <div class="phone">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>Bhupendra Kumar Dadsena: <b>9739001038</b> ,</p>
                  <p>Anuj Jaiswal: <b>9827971669</b> ,</p>
                  <p>Jagdish Prasad Dadsena: <b>9425548224</b> ,</p>
                  <p>Pursottam Prasad dadsena: <b>9926112613</b></p>
                </div> 
              </div>
            </div>

          </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
