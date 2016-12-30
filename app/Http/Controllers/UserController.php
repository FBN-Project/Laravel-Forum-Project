<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class UserController extends Controller
{
    public function getProfile()
    {
    	$user = Auth::user();
    	return view('user.profile',compact('user'));
    }
}
