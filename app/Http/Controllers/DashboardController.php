<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        
        //$user = User::find($user_id);
        //$posts = $user->posts;

        $posts = Post::where('user_id',$user_id)->orderBy('created_at','desc')->paginate(7);
        return view('dashboard')->with('posts',$posts);
    }

    public function alreadySignedIn()
    {
        return redirect('/dashboard');
    }
}
