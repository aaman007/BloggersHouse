<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name','asc')->paginate(10);
        return view('users.index')->with('users',$users);
    }
    public function showPosts($id)
    {
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->paginate(7);

        return view('users.showPosts')->with('posts',$posts);
    }
    public function show($id)
    {
        $post = POST::find($id);
        return view('users/show')->with('post',$post);
    }
}
