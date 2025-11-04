<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{

	use Notifiable;

	protected $guard = 'candidate';

    protected $fillable = ['mobile_no', 'password'];

    protected $hidden = ['password'];

}
