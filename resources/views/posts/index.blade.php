@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    @if(count($posts))
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <a href="posts/{{$post->id}}"> <h3>{{$post->title}}</h3> </a>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
        @endforeach
        {{$posts->links()}} <!-- Pagination -->
    @else
        <p>No Posts Found</p>
    @endif
    <br>
@endsection