@extends('layouts.app')

@section('content')
    <h2>Posts by {{$name}}</h2>

    @if(count($posts))
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img class="img-responsive" height="230" style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <a href="posts/{{$post->id}}"> <h3>{{$post->title}}</h3> </a>
                            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}} <!-- Pagination -->
    @else
        <p>No Posts Found</p>
    @endif
    <br>
@endsection