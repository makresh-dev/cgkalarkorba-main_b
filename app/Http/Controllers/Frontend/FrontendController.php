<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Update;
use App\Models\Gallery;
use View;
class FrontendController extends Controller
{

    // protected $weeklyUsers;

    // public function __construct()
    // {
        // View::share('visitors', $weeklyUsers);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates = Update::all();
        return view('frontend.index', compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        return view('frontend.history');
    }


    public function pen()
    {
        return view('frontend.writers-pen');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiles()
    {
        $users = User::where('status',"!=", 'Inactive')->where('name', '!=', 'admin')->where('name', '!=', 'Admin')->get();
        // dd($users->toArray());
        return view('frontend.men', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    public function userProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('frontend.user-profile', compact('user'));
    }

    public function images()
    {
        $galleries = Gallery::all();
        return view('frontend.gallery', compact('galleries'));
    }

    public function cgmahasabha()
    {
        return view('frontend.mahasbha');
    }

    public function korbaparichtra()
    {
        return view('frontend.korbaparichtra');
    }


    public function loginFailed()
    {
        return view('frontend.failed');
    }
}
