@extends('layouts.app')

@section('content')
    <!-- <a href="/posts" class="btn btn-danger">Back</a> <hr> -->

    <h1>{{$announcement->title}}</h1> <hr>
    
    @if($announcement->cover_image != 'noname.jpg')
        <img width="100%" src="/storage/cover_images/{{$announcement->cover_image}}"> <br><br>
    @endif

    <div>
        {!! $announcement->body !!}
    </div>

    <hr>
    <small>Written on {{$announcement->created_at}} by {{$announcement->user->name}}</small>

    <hr>
@endsection