@extends('layouts.app')

@section('content')

    <h1>Users</h1>

    @if(count($users))
        @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5> <a href="users/{{$user->id}}"> {{$user->name}} </a>

                <?php $diff = Carbon\Carbon::parse($user->created_at)->diffInDays(Carbon\Carbon::now()) ?>

                @if($diff <= 1)
                    <span class='badge badge-dark'>New</span>
                @endif
                </h5>
            </div>
        </div>
        @endforeach
        {{$users->links()}} <!-- Pagination -->
    @else
        <p>No Users Found</p>
    @endif
    <br>
@endsection