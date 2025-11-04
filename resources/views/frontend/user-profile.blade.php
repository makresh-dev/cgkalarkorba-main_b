@extends('frontend.layouts.app')

@section('title', 'यूजर का प्रोफाइल')

@push('css')

<style type="text/css">
	.textColor {
		color: #1017ea;
}
	}
</style>
@endpush

@section('content')

<main id="main">

    <div class="container mt-5 card shadow">
        <section id="team" class="team p-0">
		     <div class="row pt-3">
		        <div class="col-sm-3">
		           <img src="{{ asset($user->image) }}" class="rounded float-left" alt="..." style="width: 127px;">
		        </div>

		        <div class="col-sm-6">
					  <p class="text-justify"><strong>{{ $user->name }}</strong></p>
					  <p class="text-justify">{{ $user->qualification }}</p>
					  <p class="text-justify">{{ $user->occupation }}</p>
					  <p class="text-justify">{!! $user->current_address !!}</p>
                      <p class="text-justify">@if($user->gender == 'male') युवक @else युवती @endif</p>
            <!-- युवक युवती -->
		        </div> 
		        <div class="col-sm-3">
		            @if($user->register_no != '' || $user->register_no != null)
    		            <label>पंजीयन क्रमांक</label>
		                <p class="text-justify">{{ $user->register_no }}</p>
		            @endif
		        </div>
		    </div>

		    <div class="row pt-4">
              <div class="col-sm-3">
              	<label>पिता का नाम</label>
              	<p class="textColor">{{ $user->father_name }}</p>
              </div>
              <div class="col-sm-3">
              	<label>पिता का वव्साय</label>
              	<p class="textColor">{{ $user->father_occupation }}</p>
              </div>
              <div class="col-sm-3">
              	<label>माता का नाम</label>
              	<p class="textColor">{{ $user->mother_name }}</p>
              </div>
              <div class="col-sm-3">
              	<label>माता का वव्साय</label>
              	<p class="textColor">{{ $user->mother_occupation }}</p>
              </div>
		    </div>

		    <div class="row pt-3">
              <div class="col-sm-3">
              	<label>जन्मतिथि</label>
              	<p class="textColor">{{ date("d-m-Y", strtotime($user->dob)) }}</p>
              </div>
              <div class="col-sm-3">
              	<label>समय</label>
              	<p class="textColor">{{ $user->time }}</p>
              </div>
              <div class="col-sm-3">
              	<label>उचाई</label>
              	<p class="textColor">{{ $user->height }}</p>
              </div>
              <div class="col-sm-3">
              	<label>वजन</label>
              	<p class="textColor">{{ $user->weight }}</p>
              </div>
		    </div>

		    <div class="row pt-3">
              <div class="col-sm-3">
              	<label>राशि</label>
              	<p class="textColor">{{ $user->zodiac }}</p>
              </div>
              <div class="col-sm-3">
              	<label>मांगलिक</label>
              	<p class="textColor">@if($user->manglik == 'no') नहीं @else हां @endif</p>
              </div>
              <div class="col-sm-3">
              	<label>ब्लड ग्रुप</label>
              	<p class="textColor">{{ $user->blood_group }}</p>
              </div>
              <div class="col-sm-3">
              	<label>सिक्लिन या अन्य</label>
              	<p class="textColor">@if($user->other_siklin == 'no') नहीं @else हां @endif </p>
              </div>
		    </div>

		    <div class="row pt-3">
              <div class="col-sm-3">
              	<label>विवाहित भाई</label>
              	<p class="textColor">{{ $user->married_brothers }}</p>
              </div>
              <div class="col-sm-3">
              	<label>अविवाहित भाई</label>
              	<p class="textColor">{{ $user->unmarried_brothers }}</p>
              </div>
              <div class="col-sm-3">
              	<label>विवाहित बहन</label>
              	<p class="textColor">{{ $user->married_sisters }}</p>
              </div>
              <div class="col-sm-3">
              	<label>अविवाहित बहन</label>
              	<p class="textColor">{{ $user->unmarried_sisters }}</p>
              </div>
		    </div>

		    <div class="row pt-3">
              <div class="col-sm-3">
              	<label>वर्त्तमान पता</label>
              	<p class="textColor">{{ $user->current_address }}</p>
              </div>
              <div class="col-sm-3">
              	<label>स्थाई पता</label>
              	<p class="textColor">{{ $user->permenant_address }}</p>
              </div>
              @guest
                <p><span style="color: red;">नोट:- कृपया मोबाइल नंबर देखने के लिए पंजीयन कराये अथवा लोग इन करे|</span></p>
              @else
              <div class="col-sm-3">
              	<label>संपर्क</label>
              	<p class="textColor">{{ $user->mobile_no }}</p>
              </div>
              <div class="col-sm-3">
              	<label>ईमेल / दूरभाष</label>
              	<p class="textColor">{{ $user->telephone_no }}</p>
              </div>
              @endguest
		    </div>
        </section>
    </div>   
<div class="pt-5"></div>
</main>
@endsection
