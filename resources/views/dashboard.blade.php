@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <br><br>
                    <h3>Your Blog Posts</h3>

                    @if(count($posts))
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <!-- <td> <a href="/posts/{{$post->id}}">{{$post->title}}</a> </td> -->
                                    <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-dark float-sm-right">Edit</a> </td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy',$post->id] , 'method' => 'POST' , 'class' => 'form-inline float-sm-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no blog post</p>
                    @endif
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
