@extends('frontend.layouts.app')

@section('title', 'प्रोफाइल')

@push('css')
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/clockpicker/dist/bootstrap-clockpicker.css') }}">

<style type="text/css">
    .textColor {
        color: #1017ea;
}
    }
</style>
@endpush

@section('content')

@error('profileImage')
    {{ $message }} 
@enderror
@error('firstname')
    {{ $message }} 
@enderror
@error('lastname')
    {{ $message }} 
@enderror
@error('height')
    {{ $message }} 
@enderror
@error('weight')
    {{ $message }} 
@enderror
@error('zodiac')
    {{ $message }} 
@enderror
@error('manglik')
    {{ $message }} 
@enderror
@error('tribe')
    {{ $message }} 
@enderror
@error('dob')
    {{ $message }} 
@enderror
@error('birth_place')
    {{ $message }} 
@enderror
@error('time')
    {{ $message }}
@enderror
@error('day_or_night')
    {{ $message }}
@enderror
@error('blood_group')
    {{ $message }}
@enderror
@error('other_siklin')
    {{ $message }}
@enderror
@error('qualification')
    {{ $message }}
@enderror
@error('occupation')
    {{ $message }}
@enderror
@error('father_name')
    {{ $message }}
@enderror
@error('mother_name')
    {{ $message }}
@enderror
@error('father_occupation')
{{ $message }}   
@enderror
@error('mother_occupation')
{{ $message }}
@enderror
@error('married_brothers')
{{ $message }}
@enderror
@error('married_sisters')
{{ $message }}
@enderror
@error('unmarried_brothers')
{{ $message }}
@enderror
@error('unmarried_sisters')
{{ $message }}
@enderror
@error('current_address')
{{ $message }}
@enderror
@error('telephone_no')
{{ $message }}
@enderror
@error('mobile_no')
{{ $message }}
@enderror
@error('permenant_address')
{{ $message }}
@enderror
  <main id="main">         

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">प्रोफाइल अपडेट</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <!-- ======= update form ======= -->
                        <section id="contact" class="contact">
                            <div class="container">                        
                                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">  
                                    @csrf
                                    <!-- 1st row -->
                                    <div class="row">
                                        <div col-sm->
                                             <div class="col-md-4">
                                                <input type="file" id="profileImage" name="profileImage" />
                                                <img id="blah" src="{{ asset('public/assets/our-img/avatar.jpg') }}" alt="your image" class="img-thumbnail"/>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label for="">नाम</label>
                                                @php
                                                    $username = explode(" ", Auth::user()->name);    
                                                @endphp
                                                <input type="text" name="firstname" value="{{ $username[0] }}" class="form-control" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">उपनाम</label>
                                                <input type="text" name="lastname" value="{{ $username[1] }}" class="form-control" id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                        
                                        <!-- 2nd row -->
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">   
                                                <label for="">उचाई(फीट)</label>
                                                <input type="text" class="form-control" name="height" value="{{ Auth::user()->height }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">वजन(कि.ग्रा.)</label>
                                                <input type="text" class="form-control" name="weight" value="{{ Auth::user()->weight }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">राशी</label>
                                                <input type="text" name="zodiac" value="{{ Auth::user()->zodiac }}" class="form-control" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">मांगलिक</label>
                                                <select class="form-control" name="manglik">
                                                     <option @if (Auth::user()->manglik == 'no') selected @endif value="no">नहीं</option>
                                                     <option @if (Auth::user()->manglik == 'yes') selected @endif value="yes">हा</option>   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                            
                                    <!-- 3st row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label for="">गोत्र</label>
                                                <input type="text" name="tribe" value="{{ Auth::user()->tribe }}" class="form-control" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label for="">जन्मथिति</label>
                                                <input type="text" id="date" name="dob" value="{{ Auth::user()->dob }}" class="form-control" id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 4th row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">   
                                                <label for="">जन्म स्थान</label>    
                                                <input type="text" class="form-control" name="birth_place" value="{{ Auth::user()->birth_place }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">   
                                                <label>समय</label>
                                                {{-- <input type="text" class="form-control" name="time" value="{{ Auth::user()->time }}" id="" aria-describedby=""> --}}
                                                <div class="input-group clock">
                                                    <input type="text" class="form-control" name="time" value="{{ Auth::user()->time }}">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">   
                                                <label for="">दिन / शाम / रात</label>
                                                <select class="form-control" name="day_or_night" id="">
                                                    <option @if(Auth::user()->day_or_night == 'day') selected @endif value="दिन">दिन</option>
                                                    <option @if (Auth::user()->day_or_night == 'eve') selected @endif value="शाम">शाम</option>   
                                                    <option @if (Auth::user()->day_or_night == 'night') selected @endif value="रात">रात</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 5th row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">    
                                                <label for="">ब्लड ग्रुप</label>
                                                <select class="form-control" name="blood_group" id="">
                                                    <option @if (Auth::user()->blood_group == 'A+') selected @endif value="A+">A+</option>   
                                                    <option @if (Auth::user()->blood_group == 'A-') selected @endif value="A-">A-</option>
                                                    <option @if (Auth::user()->blood_group == 'B+') selected @endif value="B+">B+</option>   
                                                    <option @if (Auth::user()->blood_group == 'B-') selected @endif value="B-">B-</option>
                                                    <option @if (Auth::user()->blood_group == 'O+') selected @endif value="O+">O+</option>   
                                                    <option @if (Auth::user()->blood_group == 'O-') selected @endif value="O-">O-</option>
                                                    <option @if (Auth::user()->blood_group == 'AB+') selected @endif value="AB+">AB+</option>   
                                                    <option @if (Auth::user()->blood_group == 'AB-') selected @endif value="AB-">AB-</option>
                                                    <option @if (Auth::user()->blood_group == 'Other') selected @endif value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label>सिकलिन या अन्य</label>    
                                                <select name="other_siklin" class="form-control" id="">
                                                    <option @if (Auth::user()->other_siklin == 'no') selected @endif value="no">नहीं</option>   
                                                    <option @if (Auth::user()->other_siklin == 'yes') selected @endif value="yes">हा</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 6th row -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">    
                                                <label>शैक्षिणक योग्यता</label>
                                                <input type="text" class="form-control" name="qualification" value="{{ Auth::user()->qualification }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 7th row -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">    
                                                <label for="">व्य्वसाय</label>
                                                <input type="text" class="form-control" name="occupation" value="{{ Auth::user()->occupation }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 8th row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label for="">पिता का नाम</label>
                                                <input type="text" class="form-control" name="father_name" value="{{ Auth::user()->father_name }}" id="" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">माता का नाम</label>
                                                <input type="text" class="form-control" name="mother_name" value="{{ Auth::user()->mother_name }}" id="" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">   
                                                <label for="">पिता का वव्साय</label>
                                                <input type="text" class="form-control" name="father_occupation" value="{{ Auth::user()->father_occupation }}" id="" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">माता का वव्साय</label>
                                                <input type="text" class="form-control" name="mother_occupation" value="{{ Auth::user()->mother_occupation }}" id="" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 9th row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">      
                                                <label for="">विवाहित भाई</label>
                                                <input type="text" class="form-control" id="" name="married_brothers" value="{{ Auth::user()->married_brothers }}" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">विवाहित बहन</label>
                                                <input type="text" class="form-control" id="" name="married_sisters" value="{{ Auth::user()->married_sisters }}" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 10th row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">      
                                                <label for="">अविवाहित भाई</label>
                                                <input type="text" class="form-control" name="unmarried_brothers" value="{{ Auth::user()->unmarried_brothers }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">अविवाहित बहन</label>
                                                <input type="text" class="form-control" name="unmarried_sisters" value="{{ Auth::user()->unmarried_sisters }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 11th row -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">      
                                                <label for="">वर्तमान पताग्राम</label>
                                                <textarea class="form-control" id="" name="current_address" rows="3">{{ Auth::user()->current_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                  
                                        <!-- 13th row -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">      
                                                <label for="">गृह ग्राम का पताग्राम</label>
                                                <textarea class="form-control" name="permenant_address" id="" rows="3">{{ Auth::user()->permenant_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- 15th row -->
                                    <div class="row">
                                        <div class="col-sm-6">    
                                            <div class="form-group">      
                                                <label for="">दूरभाष / ईमेल </label>
                                                <input type="text" class="form-control" name="telephone_no"  value="{{ Auth::user()->telephone_no }}" id="" aria-describedby="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">मोबाइल नंबर</label>
                                                <input type="text" class="form-control" name="mobile_no" value="{{ Auth::user()->mobile_no }}"  id="" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                    
                                    <button type="submit" class="btn btn-primary">जमा करे</button>
                                </form>         
                            </div>
                        </section><!-- update form-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>


    <!-- ======= ***************** profile form  ++++++++++++++++++ ======= -->
    <div class="container mt-5 card shadow">
        <section id="team" class="team p-0">
             <div class="row pt-3">
                <div class="col-sm-4">
                   <img src="{{ asset(Auth::user()->image) }}" alt="..." style="width: 127px;">
                </div>

                <div class="col-sm-4">
                      <p class="text-justify"><strong>{{ Auth::user()->name }}</strong></p>
                      <p class="text-justify">{{ Auth::user()->qualification }}</p>
                      <p class="text-justify">{{ Auth::user()->occupation }}</p>
                      <p class="text-justify"></p>
                </div>

                
                   <div class="col-sm-4">
                       <button  style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <img src="https://img.icons8.com/material-sharp/24/000000/edit.png"/>
                       </button>   
                   </div>             

            </div>

            <div class="row pt-4">
              <div class="col-sm-3">
                <label>पिता का नाम</label>
                <p class="textColor">{{ Auth::user()->father_name }}</p>
              </div>
              <div class="col-sm-3">
                <label>पिता का वव्साय</label>
                <p class="textColor">{{ Auth::user()->father_occupation }}</p>
              </div>
              <div class="col-sm-3">
                <label>माता का नाम</label>
                <p class="textColor">{{ Auth::user()->mother_name }}</p>
              </div>
              <div class="col-sm-3">
                <label>माता का वव्साय</label>
                <p class="textColor">{{ Auth::user()->mother_occupation }}</p>
              </div>
            </div>

             <div class="row pt-4">
              <div class="col-sm-3">    
                <label>गोत्र</label>
                <p class="textColor">{{ Auth::user()->tribe }}</p>
              </div>
              <div class="col-sm-3">
                <label>जन्मस्थान</label>
                <p class="textColor">{{ Auth::user()->birth_place }}</p>
              </div>
              <div class="col-sm-3">
                <label>लिंग</label>
                <p class="textColor">@if(Auth::user()->gender == 'male') पुरुष @else महिला @endif</p>
              </div>
              <div class="col-sm-3">
                <label>दिन / रात / शाम</label>
                <p class="textColor">@if (Auth::user()->day_or_night == 'day') दिन @elseif(Auth::user()->day_or_night == 'eve') शाम @else रात @endif</p>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-3">
                <label>जन्मतिथि</label>
                <p class="textColor">{{ date("d-m-Y", strtotime(Auth::user()->dob)) }}</p>
              </div>
              <div class="col-sm-3">
                <label>समय</label>
                <p class="textColor">{{ Auth::user()->time }}</p>
              </div>
              <div class="col-sm-3">
                <label>उचाई</label>
                <p class="textColor">{{ Auth::user()->height }}</p>
              </div>
              <div class="col-sm-3">
                <label>वजन</label>
                <p class="textColor">{{ Auth::user()->weight }}</p>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-3">
                <label>राशि</label>
                <p class="textColor">{{ Auth::user()->zodiac }}</p>
              </div>
              <div class="col-sm-3">
                <label>मांगलिक</label>
                <p class="textColor">@if(Auth::user()->manglik == 'yes') हाँ @else नहीं @endif</p>
              </div> 
              <div class="col-sm-3">
                <label>ब्लड ग्रुप</label>
                <p class="textColor">{{ Auth::user()->blood_group }}</p>
              </div>
              <div class="col-sm-3">
                <label>सिक्लिन या अन्य</label>
                <p class="textColor">@if (Auth::user()->other_siklin == 'yes') हाँ @else नहीं @endif</p>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-3">
                <label>विवाहित भाई</label>
                <p class="textColor">{{ Auth::user()->married_brothers }}</p>
              </div>
              <div class="col-sm-3">
                <label>अविवाहित भाई</label>
                <p class="textColor">{{ Auth::user()->unmarried_brothers }}</p>
              </div>
              <div class="col-sm-3">
                <label>विवाहित बहन</label>
                <p class="textColor">{{ Auth::user()->married_sisters }}</p>
              </div>
              <div class="col-sm-3">
                <label>अविवाहित बहन</label>
                <p class="textColor">{{ Auth::user()->unmarried_sisters }}</p>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-3">
                <label>वर्त्तमान पता</label>
                <p class="textColor">{{ Auth::user()->current_address }}</p>
              </div>
              <div class="col-sm-3">
                <label>स्थाई पता</label>
                <p class="textColor">{{ Auth::user()->permenant_address }}</p>
              </div>
              <div class="col-sm-3">
                <label>संपर्क</label>
                <p class="textColor">{{ Auth::user()->mobile_no }}</p>
              </div>
              <div class="col-sm-3">
                <label>ईमेल / दूरभाष</label>
                <p class="textColor">{{ Auth::user()->telephone_no }}</p>
              </div>
            </div>
        </section>
    </div>   
    <div class="pt-5"></div>

  </main><!-- End #main -->
@endsection

@push('js')
<script src="{{ asset('public/assets/clockpicker/dist/bootstrap-clockpicker.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#profileImage").change(function() {
  readURL(this);
});


$(function() {
   $("#date").datepicker({ dateFormat: "dd-mm-yy", maxDate: '0' }).val()
});


$('.clock').clockpicker();


console.log('end');

</script>
@endpush