@extends('frontend.layouts.app')

@section('title', 'लॉग इन')

@section('content')
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-0">

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('user.login') }}" method="POST" role="form">
              @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="mobile_no" class="form-control" placeholder="टाइप पंजीयन मोबाइल नंबर"/>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="password" class="form-control" name="password" placeholder="पासवर्ड"/>
                  <div class="validate"></div>
                </div>
              </div>

            {{-- both btn    --}}
             <div class="row">
              <div class="col-sm-2">
                 <div class="form-row">
                  <div class="text-center"><button type="submit" class="btn btn-danger btn-sm">लॉग इन करे</button></div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-row">
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                        forgot
                  </button>
                </div>
              </div>
            </div>
          </form>

            


                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Forgot</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-sm-12" >
                                   <div class="input-group mb-3">
                                    <input type="text" class="form-control sendOTP" placeholder="Type registerd phone no." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-secondary sendOTP" onclick="disabledMobileNumber();" type="button">Send OTP</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-12">
                                   <div class="input-group mb-3">
                                    <input type="text" class="form-control very" disabled placeholder="Type OTP" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-secondary very" disabled type="button" id="button-addon2">Verify</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

           

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection

@push('js')

<script type="text/javascript">
    function disabledMobileNumber()
    {
      $( ".sendOTP" ).prop( "disabled", true );
      $( ".very" ).prop( "disabled", false );
    }
</script>
@endpush 