@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Create Announcement
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create Announcement</li>
        </ol>
    </section>
    <section class="content">
    {!! Form::open(['action' => 'AdminsController@store' , 'method' => 'POST'  , 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control' , 'placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id' => 'article-ckeditor' ,'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
    </div>

    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
    <br>
    </section>

@endsection