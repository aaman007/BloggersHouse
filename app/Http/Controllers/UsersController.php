<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('banned');
    }
    public function index()
    {
        $users = User::orderBy('name','asc')->paginate(10);
        return view('users.index')->with('users',$users);
    }
    public function showProfile($id){

        $user = User::find($id);
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->paginate(7);
        $data =[
            'user' => $user ,
            'posts' => $posts
        ];
        return view('users.profile')->with($data);
    }
    public function showPosts($id)
    {
        $name = User::find($id)->name;
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->paginate(7);

        $data = array(
            'posts' => $posts ,
            'name' => $name
        );
        return view('users.showPosts')->with($data);
    }
    public function show($id)
    {
        $post = POST::find($id);
        return view('users/show')->with('post',$post);
    }
    public function search()
    {
        $search = $_GET['search'];
        $users = User::where('name',$search)->orWhere('name','like',$search.'%')->orderBy('name','asc')->paginate(10);
        return view('users.index')->with('users',$users);
    }

}
