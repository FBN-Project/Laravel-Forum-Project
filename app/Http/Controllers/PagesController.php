<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use Auth;

class PagesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
    public function home()
    {
    	$posts = Post::orderBy('created_at','desc')->paginate(5);
    	return view('pages.home',compact('posts'));
    }



   	
}
