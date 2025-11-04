<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('frontend.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'profileImage' => 'required|mimes:jpeg,png,jpg',
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
            'mobile_no' => 'required',
            // 'password' => 'required'
        ]);

        // dd($request->all());

        $candidate = User::where('id', $id)->first();
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
        $candidate->dob = $request->dob;
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
        if ($request->has('password')) {
            $candidate->password = Hash::make($request->password);
        }
        $candidate->save();

        toastr()->success('Your profile has been updated.');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
