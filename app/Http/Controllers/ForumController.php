<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\postQuestionRequest;

use App\Http\Requests\ReplyRequest;

use App\Category;

use App\Post;

use App\Reply;

use Auth;

use Session;

class ForumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPost()
    {
    	$categories = Category::all();
    	return view('pages.question',compact('categories'));
    }

    public function postQuestion(postQuestionRequest $request)
    {
    	Post::create([

    		'user_id' => Auth::user()->id,
    		'category_id' => $request->get('category'),
    		'title' => $request->get('title'),
    		'body' => $request->get('body'),
            'post_by' => Auth::user()->name

    	]);

    	return redirect('/');
    }

    public function viewPost($slug)
    {
        try {

            $post = Post::where('slug',$slug)->first();
            return view('pages.reply',compact('post'));

        }
        catch(ModelNotFoundExcpetion $e)
        {
            return redirect('/');
        }
    }


    public function saveReply(ReplyRequest $request)
    {
        $post = Post::where('slug','=',$request->get('slug'))->first();
        if($post)
        {
            Reply::create([

                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'body' => $request->get('body')

            ]);

            return redirect()->back();
        }
        return redirect('/');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        if(Auth::user()->id == $post->user_id)
        {
            $categories = Category::all();
            return view('pages.edit',compact('post','categories'));
        }else{
            return redirect()->back();
        }
    
    }

    public function updatePost($id,Request $request)
    {
        $this->validate($request,['title' => 'required','body' => 'required' , 'category_id' => 'required']);
        $post = Post::findOrFail($id);
        $post->update($request->all());
        Session::flash('post_edit','Successfully Post Updated!');
        return redirect('/');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('post_delete','Successfully Post Deleted!');
        return redirect()->back();
    }

    public function editReply($id)
    {
        $reply = Reply::findOrFail($id);
        return view('pages.reply',compact('reply'));
    }

    public function updateReply($id,Request $request)
    {
        $this->validate($request,['body' => 'required']);
        $reply = Reply::findOrFail($id);
        $reply->update($request->all());
        return redirect()->back();
    }

    public function deleteReply($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->delete();
        return redirect()->back();
    }

}
