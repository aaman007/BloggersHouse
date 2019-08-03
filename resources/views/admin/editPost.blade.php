@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Edit Post
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin-panel/posts"><i class="fa fa-dashboard"></i> Posts</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>
    <section class="content">
            {!! Form::open(['action' => ['AdminPostsController@update',$post->id] , 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$post->title,['class' => 'form-control' , 'placeholder' => 'Title'])}}
            </div>
    
            <div class="form-group">
                    {{Form::label('body','Body')}}
                    {{Form::textarea('body',$post->body,['id' => 'article-ckeditor' ,'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
            </div>
    
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    
        {!! Form::close() !!}
        <br>
    </section>

@endsection