@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Admins
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admins</li>
        </ol>
    </section>

    <section class="content">
        <table class="table table-striped text-center">
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        @foreach($admins as $admin)
            <tr>
            <td>{{$admin->name}}</td>
            <td>
                @if($admin->id != Auth::user()->id)
                    <a href="/admin-panel/admins/{{$admin->id}}" class="btn btn-info"> View</a>
                @endif
                @if($admin->id != Auth::user()->id)
                    <a href="/admin-panel/admins/remove/{{$admin->id}}" class="btn btn-danger"> Remove Admin</a>
                @endif
            </td>
            </tr>
        @endforeach
        </table>
        <div class="justify-content-center">
            {{$admins->links()}} <!-- Pagination -->
        </div>
        </section>

@endsection