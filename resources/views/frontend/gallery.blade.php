@extends('frontend.layouts.app')

@section('title', 'गैलरी')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
@endpush
@section('content') 
 <main id="main">
    <section id="contact" class="contact"> 

      <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      @foreach ($galleries as $image)
        <div class="swiper-slide"><img src="{{ asset($image->image) }}" class="img-fluid" alt="Responsive image"/></div>
      @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

    </section>

  </main><!-- End #main -->
  <div class="mt-3"></div>
@endsection

@push('js')
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
@endpush