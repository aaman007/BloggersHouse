@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        View Announcement
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin-panel/announcements"><i class="fa fa-dashboard"></i> Announcements</a></li>
        <li class="active">View Announcement</li>
        </ol>
    </section>
    <section class="content">
            <h1>{{$announcement->title}}</h1> <hr>
    
            @if($announcement->cover_image != 'noname.jpg')
                <img width="100%" src="/storage/cover_images/{{$announcement->cover_image}}"> <br><br>
            @endif
        
            <div>
                {!! $announcement->body !!}
            </div>
        
            <hr>
            <small>Written on {{$announcement->created_at}} by {{$announcement->user->name}}</small>
    </section>

@endsection