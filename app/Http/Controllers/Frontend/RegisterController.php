<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Hash;
use Session;
use App\Candidate;
use App\User;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('frontend.register');
    } 

    public function register(Request $request)
    {
    	$this->validate($request, [
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'profileImage' => 'required|mimes:jpeg,png,jpg',
    		'gender' => 'required',
    		'height' => 'required',
    		'weight' => 'required',
    		'zodiac' => 'required',
    		'manglik' => 'required',
    		'tribe' => 'required',
    		'dob' => 'required',
    		'birth_place' => 'required',
    		'time' => 'required',
    		'day_or_night'=> 'required',
    		'blood_group' => 'required',
    		'other_siklin' => 'required',
    		'qualification' => 'required',
    		'occupation' => 'required',
    		'father_name' => 'required',
    		'mother_name' => 'required',
    		'married_brothers' => 'required',
    		'married_sisters' => 'required',
    		'unmarried_brothers' => 'required',
    		'unmarried_sisters' => 'required',
    		'current_address' => 'required',
    		'permenant_address' => 'required',
    		'mobile_no' => 'required|unique:users',
    		'password' => 'required'
    	]);

        $candidate = new User;
        $candidate->name = $request->firstname.' '.$request->lastname;

        if ($request->hasFile('profileImage')) 
        {
            // return "Hello";
            $image = $request->file('profileImage');
            $imgname = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $imgname);    
            $candidate->image = 'public/uploads/'.$imgname;
        }
        $candidate->gender = $request->gender;
        $candidate->height = $request->height;
        $candidate->weight = $request->weight;
        $candidate->zodiac = $request->zodiac;
        $candidate->manglik = $request->manglik;
        $candidate->tribe = $request->tribe;
        $candidate->dob = date('Y-m-d', strtotime($request->dob));
        $candidate->birth_place = $request->birth_place;
        $candidate->time = $request->time;
        $candidate->day_or_night = $request->day_or_night;
        $candidate->blood_group = $request->blood_group;
        $candidate->other_siklin = $request->other_siklin;
        $candidate->qualification = $request->qualification;
        $candidate->occupation = $request->occupation;
        $candidate->father_name = $request->father_name;
        $candidate->mother_name = $request->mother_name;
        $candidate->father_occupation = $request->father_occupation;
        $candidate->mother_occupation = $request->mother_occupation;
        $candidate->married_brothers = $request->married_brothers;
        $candidate->married_sisters = $request->married_sisters;
        $candidate->unmarried_brothers = $request->unmarried_brothers;
        $candidate->unmarried_sisters = $request->unmarried_sisters;
        $candidate->current_address = $request->current_address;
        $candidate->permenant_address = $request->permenant_address;
        $candidate->telephone_no = $request->telephone_no;
        $candidate->mobile_no = $request->mobile_no;
        $candidate->password = Hash::make($request->password);
        $candidate->register_no = uniqid('cgk', true);
        $candidate->save();
        return Redirect::to('/');
        
        // Authorisation details.
        // $username = "creativeworld961@gmail.com";
        // $hash = "933223dfe4e7394fe3810b9e690d7c7789ddc55c9893c1ebfdf77a64ecf3e5de";

        // $sender = 'PHPPOT';
        // $otp = rand(100000, 999999);
        // Session::put('otp', $otp);

        // // Config variables. Consult http://api.textlocal.in/docs for more info.
        // $test = "0";

        // // Data for text message. This is the text message data.
        // $sender = "TXTLCL"; // This is who the message appears to be from.
        // $numbers = $request->mobile_no; // A single number or a comma-seperated list of numbers
        // $message = $otp;
        // // 612 chars or less
        // // A single number or a comma-seperated list of numbers
        // $message = urlencode($message);
        // $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        // $ch = curl_init('http://api.textlocal.in/send/?');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($ch); // This is the result from the API
        // // dd($ch);
        // curl_close($ch);
        // toastr()->info('Please verify your otp first.');
        // return Redirect::to('/otp');

    }

    // public function otpenter()
    // {
    //     return view('frontend.otp');
    // }

    // public function verifySMS(Request $request)
    // {
    //     $this->validate($request, [
    //         'otp' => 'required',
    //     ]);
        
    //     if ($request->otp == Session::get('otp')) {
    //         Session::forget('otp');
    //         toastr()->success('Your OTP is verified please continue to login');
    //         return Redirect::to('/');
    //     } 
    //     else 
    //     {
    //         toastr()->error('Your otp is not verified');
    //         return Redirect::to('/otp');
    //     }

    // }
}
