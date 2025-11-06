@extends('frontend.layouts.app')

@section('title', 'होम')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="card mt-4" style="z-index: 10;background-color: rgba(0, 0, 0, 0.274);color: white;" class="fixed-top ">
      <div class="card-body">
          <marquee direction = "left"> @foreach ($updates as $update) <img src="{{ asset('public/assets/our-img/unnamed.png') }}" height="60" alt=""/> {{ $update->updats }} &nbsp; &nbsp; @endforeach </marquee>
      </div>
    </div>
              

    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('public/assets/img/slide/DSC_7415.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">छत्तीसगढ़ कलार <span>महासभा Korba</span></h2>
              <p class="animate__animated animate__fadeInUp">कोरबा परिक्षेत्र <br/>युवक-युवती पंजीयन/आवेदन</p>
              <a href="{{ route('user.register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">पंजीयन करे</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/slide/WK3_5771-146.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">छत्तीसगढ़ कलार <span>महासभा</span></h2>
              <p class="animate__animated animate__fadeInUp">कोरबा परिक्षेत्र <br/>युवक-युवती पंजीयन/आवेदन</p>
              <a href="{{ route('user.register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">पंजीयन करे</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/slide/WK3_5525-133.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">छत्तीसगढ़ कलार <span>महासभा</span></h2>
              <p class="animate__animated animate__fadeInUp">कोरबा परिक्षेत्र <br/>युवक-युवती पंजीयन/आवेदन</p>
              <a href="{{ route('user.register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">पंजीयन करे</a>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
@endsection
