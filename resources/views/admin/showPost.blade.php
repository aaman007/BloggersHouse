@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        View Post
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin-panel/posts"><i class="fa fa-dashboard"></i> Posts</a></li>
        <li class="active">View Post</li>
        </ol>
    </section>
    <section class="content">
            <h1>{{$post->title}}</h1> <hr>
    
            @if($post->cover_image != 'noname.jpg')
                <img width="100%" src="/storage/cover_images/{{$post->cover_image}}"> <br><br>
            @endif
        
            <div>
                {!! $post->body !!}
            </div>
        
            <hr>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    </section>

@endsection