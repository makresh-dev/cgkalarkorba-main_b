<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }} - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('public/assets/our-img/favicon-32x32.png') }}" rel="icon">
  <link href="{{ asset('public/assets/our-img/favicon-32x32.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- my font -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <!-- Time picker css file -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/js/jquery-timepicker-master/jquery.timepicker.css') }}">
  <!-- Template Main CSS File -->
  <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
  @toastr_css
  @stack('css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

    <h5 class="logo" style="font-size: 1rem;"><a href="{{ route('index') }}"><img src="{{ asset('public/assets/our-img/LOGO_6-removebg-preview.png') }}" class="rounded mx-auto d-block" alt="...">छत्तीसगढ़ कलार महासभा</a></h5>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('index') }}">होम</a></li>
          <li class="drop-down {{ request()->is('about-us') || request()->is('team') ? 'active' : '' }}"><a href="#">सामाजिक परिचय</a>
            <ul>
              <li class="{{ request()->is('writers-pen') ? 'active' : '' }}"><a href="{{ route('pen') }}">लेखक का कलम</a></li>
              <li class="{{ request()->is('history') ? 'active' : '' }}"><a href="{{ route('history') }}">इतिहास</a></li>
               <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="{{ route('about') }}">हमारे बारे में</a></li>
            </ul>
          </li>
          <li class="{{ request()->is('search') ? 'active' : '' }}"><a href="{{ route('profiles') }}">युवक-युवती</a></li>

          {{-- <li class="{{ request()->is('position') ? 'active' : '' }}"><a href="">पधादिकारिओ का विवरण</a></li> --}}

          <li class="drop-down {{ request()->is('chhattisgarh-kalar-mahasabha') || request()->is('korba-parichtra') ? 'active' : '' }}"><a href="#">पधादिकारिओ का विवरण</a>
            <ul>
              <li class="{{ request()->is('chhattisgarh-kalar-mahasabha') ? 'active' : '' }}"><a href="{{ route('padh.one') }}">छत्तीसगढ़ कलार महासभा</a></li>
              <li class="{{ request()->is('korba-parichtra') ? 'active' : '' }}"><a href="{{ route('padh.two') }}">कोरबा परीक्षेत्र</a></li>
            </ul>
          </li>

          <li class="{{ request()->is('gallery-images') ? 'active' : '' }}"><a href="{{ route('gallery.images') }}">गैलरी</a></li>
          <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{ route('contact') }}">सम्पर्क</a>
        </ul>

      </nav><!-- .nav-menu -->

      <div class="dropdown" style="padding-left: 20px;">
        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @guest
            पंजीयन करे
          @else
            {{ Auth::user()->name }}
          @endguest
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @guest
            <a class="dropdown-item" href="{{ route('user.register') }}">ऑनलाइन</a>
            <a class="dropdown-item" href="{{ asset('public/form/11111.pdf') }}">ऑफलाइन</a>
            <a class="dropdown-item" href="{{ route('user.login') }}">लॉग इन</a>
          @else
            <a class="dropdown-item" href="{{ route('user.profile',['id' => Auth::user()->id]) }}">यूजर प्रोफाइल</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @endguest
        </div>
      </div>

    </div>
  </header><!-- End Header -->

    @if(!request()->is('/'))
      <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center pt-3">
              <h6>@yield('title')</h6>
              <ol>
                <li><a href="{{ route('index') }}">होम</a></li>
                <li>@yield('title')</li>
              </ol>
            </div>

          </div>
       </section><!-- End Breadcrumbs -->
    @endif
    @yield('content')    

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h5>छत्तीसगढ़ कलार महासभा Korba</h5>
              <p>
                 कोरबा परिक्षेत्र <br>
                 युवक-युवती पंजीयन/आवेदन<br><br>
                <strong>Phone:</strong> 9739001038<br>
                <strong>Email:</strong> Cgkorbakalar@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/gkorbakalar" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/cgkorba.kalar.1" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/cgkorbakalar/" class="instagram"><i class="bx bxl-instagram"></i></a>
                {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                <a href="https://t.me/cgkorbakalar" class="telegram"><i class="bx bxl-telegram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              @guest
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.login') }}">लॉग इन</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.register') }}">पंजीयन</a></li>
              @else
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.profile',['id' => Auth::user()->id]) }}">यूजर प्रोफाइल</a></li>
              @endguest
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Online Payment</h4>
            <img src="{{ asset('public/assets/our-img/paytm.png') }}" alt="..." style="height: 52px" alt="..." class="img-thumbnail">
            <img src="{{ asset('public/assets/our-img/google-pay.png') }}" alt="..."style="height: 52px" alt="..." class="img-thumbnail">
            <img src="{{ asset('public/assets/our-img/PhonePe-Logo.wine.png') }}"  style="height: 52px" alt="..." class="img-thumbnail">
            <h5 class="mt-3">Mob: 9739001038</h5>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCgkorbakalarcom-106079264685430&tabs=timeline&width=340&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1128672717484518" width="340" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
          <!--visitor-->
          <span class="badge badge-light">
            <div id="CounterVisitor">
                <span class="counter-item">0</span>
                <span class="counter-item">0</span>
                <span class="counter-item">1</span>
                <span class="counter-item">1</span>
                <span class="counter-item">8</span>
                <span class="counter-item">4</span>
            </div>
          </span><br>
          <!--end visitor-->
        &copy; Copyright <strong><span>Digitech</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Digitech</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  {{-- <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  {{-- <script src="{{ asset('public/assets/js/jquery-timepicker-master/jquery.timepicker.js') }}"></script> --}}
  @toastr_js
  @toastr_render
  <!-- Template Main JS File -->
  <script src="{{ asset('public/assets/js/main.js') }}"></script>
  <!--visitor-->
  <script>
          var n = localStorage.getItem('on_load_counter');

    if (n === null) {
        n = 0;
    }

    n++;

    localStorage.setItem("on_load_counter", n);

    document.getElementById('CounterVisitor').innerHTML = n;

  </script>
  @stack('js')
</body>
</html>