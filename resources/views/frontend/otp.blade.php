@extends('frontend.layouts.app')

@section('title', 'सत्यापित करे')

@section('content')
  <main id="main" style="margin-top: 8rem;">
    <div class="container">
	  <div class="row">
	    <div class="col-sm-4">
	      <form method="POST" action="{{ route('veryotp') }}">
	      	@csrf
			  <div class="form-group">
			    <label>OTP</label>
			    <input type="text" name="otp" class="form-control" id="">
			  </div>
			  <button type="submit" class="btn btn-primary">verify</button>
		 </form>
	    </div>
	  </div>
    </div>
    <div class="mt-5"></div>
  </main>

  {{-- {{ Session::get('message') }} --}}
  {{-- {{ Session::get('otp') }} --}}
@endsection
