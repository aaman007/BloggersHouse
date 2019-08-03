@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Announcements
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Announcements</li>
        </ol>
    </section>

    <section class="content">
            @if(count($announcements))
                <table class="table table-striped text-center">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                @foreach($announcements as $announcement)
                    <tr>
                    <td>{{$announcement->title}}</td>
                    <td>{{$announcement->user->name}}</td>
                    <td>
                        <a href="/admin-panel/announcements/{{$announcement->id}}" class="btn btn-info"> View</a>
                        <a href="/admin-panel/announcements/edit/{{$announcement->id}}" class="btn btn-primary"> Edit</a>
                        <a href="/admin-panel/announcements/delete/{{$announcement->id}}" class="btn btn-danger"> Delete</a>
                    </td>
                    </tr>
                @endforeach
                </table>
                <div class="justify-content-center">
                    {{$announcements->links()}} <!-- Pagination -->
                </div>

            @else
                No Announcements Available
            @endif
        </section>

@endsection