<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Frontend')->group(function () {
	Route::get('/', 'FrontendController@index')->name('index');
	Route::get('/writers-pen', 'FrontendController@pen')->name('pen');
	Route::get('/history', 'FrontendController@history')->name('history');
	Route::get('/about-us', 'FrontendController@about')->name('about');
	Route::get('/profiles', 'FrontendController@profiles')->name('profiles');
	Route::get('/contact-us', 'FrontendController@contact')->name('contact');
	// Route::get('/gallery', 'FrontendController@galleryImages')->name('gallery');
	Route::get('gallery-images', 'FrontendController@images')->name('gallery.images');
	Route::get('/chhattisgarh-kalar-mahasabha', 'FrontendController@cgmahasabha')->name('padh.one');
	Route::get('/korba-parichtra', 'FrontendController@korbaparichtra')->name('padh.two');

	Route::get('/register', 'RegisterController@index')->name('user.register')->middleware('guest');
	Route::post('/register', 'RegisterController@register')->name('user.register');

	Route::get('/login', 'AuthController@index')->name('user.login')->middleware('guest');
	Route::post('/login',[ 'uses' => 'AuthController@login', 'middleware' => 'checkstatus'])->name('user.login');

	Route::get('/otp', 'RegisterController@otpenter')->name('otp');
	Route::post('/verify-otp', 'RegisterController@verifySMS')->name('veryotp');

	Route::get('/login-failed', 'FrontendController@loginFailed')->name('login.failed');

	Route::group(['middleware' => 'auth'], function() {
		Route::get('profile/{id}', 'ProfileController@index')->name('user.profile');
		Route::post('profile/{id}/update', 'ProfileController@update')->name('profile.update');
	});

	Route::get('/user-profile/{id}', 'FrontendController@userProfile')->name('user.profiles');
	
	
});
