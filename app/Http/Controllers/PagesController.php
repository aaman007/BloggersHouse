<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('banned' , ['except' => ['index']]);
    }
    public function index(){
        $title = 'Welcome to CodeVille';
        //return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $data = array(
            'title' => 'About Us' ,
            'infos' => ['Developer : Amanur Rahman' , 'Developer : Fahedur Rahman Rahel'  , 'Department : CSE' , 'University : Metropolitan University',
            'Framework : Laravel']
        );

        return view('pages.about')->with($data);
    }

    public function services(){
        $data = array(
            'title' => 'Our Services',
            'services' => ['Competitive Programming','Graphics Design','Web Development','Web Design','Android Development','iOS Development']
        );
        return view('pages.services')->with($data);
    }
}
