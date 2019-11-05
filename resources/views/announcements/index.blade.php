@extends('layouts.app')

@section('content')
    <h1>Announcements</h1>

    @if(count($announcements))
        @foreach($announcements as $announcement)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img class="img-responsive" height="230" style="width:100%" src="/storage/cover_images/{{$announcement->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <a href="announcements/{{$announcement->id}}"> <h3>{{$announcement->title}}</h3> </a>
                            <small>Written on {{$announcement->created_at}} by {{$announcement->user->name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$announcements->links()}} <!-- Pagination -->
    @else
        <p>No Announcements Found</p>
    @endif
    <br>
@endsection