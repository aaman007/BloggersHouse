@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-danger">Back</a> <hr>

    <h1>{{$post->title}}</h1>

    <div>
        {!! $post->body !!}
    </div>

    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

    <hr>

    @if(!Auth::guest() && Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-dark"> Edit </a>

        {!!Form::open(['action' => ['PostsController@destroy',$post->id] , 'method' => 'POST' , 'class' => 'form-inline float-sm-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
    <br><br>

@endsection