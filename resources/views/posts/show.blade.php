@extends('layouts.app')

@section('content')
    <!-- <a href="/posts" class="btn btn-danger">Back</a> <hr> -->

    <h1>{{$post->title}}</h1> <hr>
    
    @if($post->cover_image != 'noname.jpg')
        <img width="100%" src="/storage/cover_images/{{$post->cover_image}}"> <br><br>
    @endif

    <div>
        {!! $post->body !!}
    </div>

    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

    <hr>

    @if(!Auth::guest() && (Auth::user()->id == $post->user_id || Auth::user()->admin))
        <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark"> Edit </a>

        {!!Form::open(['action' => ['PostsController@destroy',$post->id] , 'method' => 'POST' , 'class' => 'form-inline float-sm-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-outline-danger'])}}
        {!!Form::close()!!}
    @endif
    <br><br>

@endsection