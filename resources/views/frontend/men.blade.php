@extends('frontend.layouts.app')

@section('title', 'युवक-युवती')

@section('content')
  <main id="main">

      <div class="container">
        <!-- -------------------------------------------------------------------------------------------- -->

         <!-- ======= filter Section ======= -->
    <section id="portfolio" class="portfolio">
      <!-- <div class="container"> -->
        <div class="row">
          <div class="col-md-12">
            <ul id="portfolio-flters">
               <li data-filter="*" class="filter-active">सभी</li>
              <li data-filter=".filter-card">युवक</li>
              <li data-filter=".filter-web">युवती</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">



          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <!-- <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="{{ asset('public/assets/img/portfolio/portfolio-2.jpg') }}" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-12">
             <section id="team" class="team p-0">
                <div class="row">
                    @foreach ($users as $user)
                        <div class="col-md-4 portfolio-item @if($user->gender == 'male') filter-card @else filter-web @endif ">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="{{ asset($user->image) }}" class="img-fluid" alt=""></div>
                                <div class="member-info">
                                  <h4>{{ $user->name }}</h4>
                                  <span>{{ $user->tribe }}</span>
                                  <p>{{ $user->current_address }}</p>
                                  <div class="pt-2"></div>
                                  <a href="{{ route('user.profiles', $user->id) }}">पूर्ण विव्रण</a>
                                </div>
                            </div>
                        </div>
                  @endforeach
                </div>
            </section>
          </div>

       
        </div>

      <!-- </div> -->
    </section><!-- End filter Section -->

</main><!-- End #main -->

  <div class="mt-3"></div>
@endsection

@push('js')
<script type="text/javascript">
	
</script>
@endpush