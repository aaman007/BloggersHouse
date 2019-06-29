@extends('layouts.app')
@section('content')
    
    <h1>{{$title}}</h1>
    <p>This is the greatest about page on planet earth </p>

    @if(count($infos))
        <ul class="list-group">
            @foreach($infos as $info)
                <li class="list-group-item"> {{$info}} </li>
            @endforeach
        </ul>
    @endif
    
@endsection
