@extends('layouts.app')

@section('content')

    <div class="card text-center">
            <div class="card-header">
                Services
            </div>
            <div class="card-body">
                <h5 class="card-title">Our Services</h5>
                <p class="card-text">
                        @if(count($services))
                            <ul class="list-group">
                                @foreach($services as $service)
                                    <li class="list-group-item"> {{$service}} </li>
                                @endforeach
                            </ul>
                    @endif
                </p>
            </div>
        </div>

@endsection
