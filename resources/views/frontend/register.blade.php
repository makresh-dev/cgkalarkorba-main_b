@extends('frontend.layouts.app')

@section('title', 'पंजीयन करे')

@push('css')
{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
{{-- <link href="{{ asset('public/assets/js/bootstrap-material-datetimepicker-gh-pages/css/bootstrap-material-datetimepicker.css') }}" ref="stylesheet"/> --}}
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/clockpicker/dist/bootstrap-clockpicker.css') }}">
@endpush

@section('content')
    <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        
        <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
            @csrf

             <div class="row">
                <div class="col-md-4 offset-md-8">
                    <input type="file" id="profileImage" name="profileImage" />
                    <img id="blah" src="{{ asset('public/assets/our-img/avatar.jpg') }}" alt="your image" class="img-thumbnail"/>
                </div>
             </div>    

            <!-- 1st row -->
            <div class="row mt-3" style="height:20%;">
                <div class="col-sm-4">
                    <div class="form-group">   
                        <label >नाम</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" aria-describedby="emailHelp">
                    </div>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label >उपनाम</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" aria-describedby="emailHelp">
                    </div>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">लिंग</label>
                        <select class="form-control" name="gender" value="{{ old('gender') }}">
                            <option value="male">पुरूष</option>   
                            <option value="female">महिला</option>
                        </select>
                    </div>
                </div>
            </div>

                <!-- 2nd row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">   
                        <label >उचाई(फीट)</label>
                        <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height') }}" aria-describedby="emailHelp">
                    </div>
                    @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label >वजन(कि ग्राम)</label>
                        <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" aria-describedby="emailHelp">
                    </div>
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label >राशी</label>
                        <input type="text" class="form-control @error('zodiac') is-invalid @enderror" id="zodiac" name="zodiac" value="{{ old('zodiac') }}" aria-describedby="emailHelp">
                    </div>
                    @error('zodiac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">मांगलिक</label>
                        <select class="form-control @error('manglik') is-invalid @enderror" name="manglik" >
                            <option value="no">नहीं</option>
                            <option value="yes">हा</option>   
                        </select>
                    </div>
                </div>
            </div>

                  
            <!-- 3st row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">   
                        <label >गोत्र</label>
                        <input type="text" class="form-control @error('tribe') is-invalid @enderror" name="tribe" value="{{ old('tribe') }}" aria-describedby="emailHelp">
                    </div>
                    @error('tribe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">   
                        <label >जन्मथिति</label>
                        <input type="text" id="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" aria-describedby="emailHelp">
                    </div>
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

             <!-- 4th row -->
             <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">   
                        <label >जन्म स्थान</label>    
                        <input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" aria-describedby="emailHelp">
                    </div>
                    @error('birth_place')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-group">   
                        <label >समय</label>
                        {{-- <input type="text" id="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" aria-describedby="emailHelp"> --}}
                        <div class="input-group clockpicker">
                            <input type="text" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                       </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">   
                        <label >दिन / शाम / रात</label>
                         <select class="form-control @error('day_or_night') is-invalid @enderror" name="day_or_night" >
                            <option @if (old('day_or_night') == 'day') selected="selected" @endif value="day">दिन</option>
                             <option @if (old('day_or_night') == 'eve') selected="selected" @endif value="eve">शाम</option>      
                            <option @if (old('day_or_night') == 'night') selected="selected" @endif value="night">रात</option>
                         </select>
                    </div>
                </div>
            </div>

             <!-- 5th row -->
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">    
                        <label >ब्लड ग्रुप</label>
                         <select class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" >
                            <option @if (old('blood_group') == 'A+') selected="selected" @endif value="A+">A+</option>   
                            <option @if (old('blood_group') == 'A-') selected="selected" @endif value="A-">A-</option>
                            <option @if (old('blood_group') == 'B+') selected="selected" @endif value="B+">B+</option>   
                            <option @if (old('blood_group') == 'B-') selected="selected" @endif value="B-">B-</option>
                            <option @if (old('blood_group') == 'O+') selected="selected" @endif value="O+">O+</option>   
                            <option @if (old('blood_group') == 'O-') selected="selected" @endif value="O-">O-</option>
                            <option @if (old('blood_group') == 'AB+') selected="selected" @endif value="AB+">AB+</option>   
                            <option @if (old('blood_group') == 'AB-') selected="selected" @endif value="AB-">AB-</option>
                            <option @if (old('blood_group') == 'Other') selected="selected" @endif value="Other">Other</option>
                         </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">   
                        <label >सिकलिन या अन्य</label>    
                        <select class="form-control @error('other_siklin') is-invalid @enderror" name="other_siklin">
                            <option @if (old('other_siklin') == 'no') selected="selected" @endif value="no">नहीं</option>
                            <option @if (old('other_siklin') == 'yes') selected="selected" @endif value="yes">हा</option>   
                        </select>
                    </div>
                </div>
            </div>

             <!-- 6th row -->
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">    
                        <label >शैक्षिणक योग्यता</label>
                        <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification') }}" aria-describedby="emailHelp">
                    </div>
                    @error('qualification')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- 7th row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">    
                        <label >व्य्वसाय</label>
                        <input type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" aria-describedby="emailHelp">
                    </div>
                    @error('occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- 8th row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">   
                        <label >पिता का नाम</label>
                        <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" aria-describedby="emailHelp">
                    </div>
                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label >माता का नाम</label>
                        <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" aria-describedby="emailHelp">
                    </div>
                    @error('mother_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                  {{-- mother and father occupation --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">   
                        <label >पिता का व्य्वसाय</label>
                        <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" name="father_occupation" value="{{ old('father_occupation') }}" aria-describedby="emailHelp">
                    </div>
                    @error('father_occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label >माता का व्य्वसाय</label>
                        <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" name="mother_occupation" value="{{ old('mother_occupation') }}" aria-describedby="emailHelp">
                    </div>
                    @error('mother_occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- 9th row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">      
                        <label >विवाहित भाई</label>
                        <input type="text" class="form-control @error('married_brothers') is-invalid @enderror" name="married_brothers" value="{{ old('married_brothers') }}" aria-describedby="emailHelp">
                    </div>
                    @error('married_brothers')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label >विवाहित बहन</label>
                        <input type="text" class="form-control @error('married_sisters') is-invalid @enderror" name="married_sisters" value="{{ old('married_sisters') }}" aria-describedby="emailHelp">
                    </div>
                    @error('married_sisters')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

             <!-- 10th row -->
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">      
                        <label >अविवाहित भाई</label>
                        <input type="text" class="form-control @error('unmarried_brothers') is-invalid @enderror" name="unmarried_brothers" value="{{ old('unmarried_brothers') }}" aria-describedby="emailHelp">
                    </div>
                    @error('unmarried_brothers')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label >अविवाहित बहन</label>
                        <input type="text" class="form-control @error('unmarried_sisters') is-invalid @enderror" name="unmarried_sisters" value="{{ old('unmarried_sisters') }}" aria-describedby="emailHelp">
                    </div>
                    @error('unmarried_sisters')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

             <!-- 11th row -->
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">      
                        <label >वर्तमान पताग्राम  <span style="color: red; font-size: 15px;">(कृपया पूर्ण पता डाले|)</span></label>
                        <textarea class="form-control @error('current_address') is-invalid @enderror" name="current_address" aria-describedby="emailHelp">{{ old('current_address') }}</textarea>
                    </div>
                    @error('current_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
             </div>



              <!-- 13th row -->
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">      
                        <label >गृह ग्राम का पताग्राम  <span style="color: red; font-size: 15px;">(कृपया पूर्ण पता डाले|)</span></label>
                        <textarea class="form-control @error('permenant_address') is-invalid @enderror" name="permenant_address" aria-describedby="emailHelp">{{ old('permenant_address') }}</textarea>
                    </div>
                    @error('permenant_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
             </div>



             <!-- 15th row -->
             <div class="row">
                <div class="col-sm-4">    
                    <div class="form-group">      
                        <label >दूरभाष / ईमेल</label>
                        <input type="text" class="form-control @error('telephone_no') is-invalid @enderror" name="telephone_no" value="{{ old('telephone_no') }}" aria-describedby="emailHelp">
                    </div>
                    @error('telephone_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label >मोबाइल नंबर</label>
                        <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" aria-describedby="emailHelp">
                    </div>
                    @error('mobile_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">सेट पासवर्ड</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    </div>
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
             </div>



             <!-- <div class="separator">यूजर ऑथेंटिकेशन के लिए</div> -->

               <!-- 16th row -->

            <!-- <div class="form-group">
              <label >मोबाइल नंबर</label>
              <input type="text" class="form-control" aria-describedby="emailHelp">
            </div> -->
           

            <button type="submit" class="btn btn-primary">जमा करे</button>
          </form>

 

      </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection

@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}
{{-- <script src="{{ asset('public/assets/js/bootstrap-material-datetimepicker-gh-pages/js/bootstrap-material-datetimepicker.js') }}"></script> --}}
<script src="{{ asset('public/assets/clockpicker/dist/bootstrap-clockpicker.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    // console.log("hello");
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

$('.clockpicker').clockpicker();

console.log('----------end--------------');

</script>
@endpush