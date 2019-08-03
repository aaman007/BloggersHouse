@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Users
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
            @if(count($users))
                <table class="table table-striped text-center">
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                @foreach($users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        @if(Auth::user()->id != $user->id)
                            <a href="/admin-panel/users/{{$user->id}}" class="btn btn-info"> View</a>
                        @endif

                        @if($user->admin == false && !$user->banned)
                            <a href="/admin-panel/users/make-admin/{{$user->id}}" class="btn btn-warning"> Make Admin</a>
                        @endif
                        
                        @if(Auth::user()->id != $user->id && $user->banned == false)
                            <a href="/admin-panel/users/ban/{{$user->id}}" class="btn btn-danger"> Ban User</a>
                        @elseif(Auth::user()->id != $user->id)
                            <a href="/admin-panel/users/remove-ban/{{$user->id}}" class="btn btn-danger"> Remove Ban</a>
                        @endif
                    </td>
                    </tr>
                @endforeach
                </table>
                <div class="justify-content-center">
                    {{$users->links()}} <!-- Pagination -->
                </div>

            @else
                No Users
            @endif
        </section>

@endsection