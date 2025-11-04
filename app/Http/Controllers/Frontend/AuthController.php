<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class AuthController extends Controller
{

	use AuthenticatesUsers;

	protected $redirectTo = '/';

	public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function index()
    {
    	return view('frontend.login');
    } 

    public function guard()
    {
        return Auth::guard('candidate');
    }

    public function username(){
        return 'mobile_no';
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
            'mobile_no' => 'required|regex:/[0-9]{10}/|digits:10',
            'password' => 'required',
        ]);

        $user = User::where('mobile_no', $request->mobile_no)->first();

        if($user->status == 'Inactive')
        {
            // dd($user->toArray());
            return redirect()->to('/login-failed');
        }

    	if(Auth::attempt($request->only('mobile_no', 'password'))) {

    		return redirect()->to('/');
    	}
    	else {
    		return redirect()->to('/login');
    	}
    }
}
