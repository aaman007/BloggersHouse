@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         {{$admin->name}}
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin-panel/admins"><i class="fa fa-dashboard"></i> Admins</a></li>
        <li class="active">{{$admin->name}}</li>
        </ol>
    </section>

    <section class="content">
        <div class="card text-center" style="margin:0 auto;float:none;">

                <h3 class="card-header">Profile </h3>
        
                <ul class="list-group">
                    <li class="list-group-item">
                        <img style="margin-bottom:10px;width:450px;height:400px;" class="img-thumbnail  bg-secondary" src="/storage/profile_pictures/{{$admin->profile_picture}}">
                        <br>
                        <a class="btn btn-primary" href="/users/userposts/{{$admin->id}}" role="button">See Posts in User Panel</a>
                    </li>
        
                    <div style="font-family:Helvetica;font-weight:bold;font-size:17px;color:#0B3868;">
                        <li class="list-group-item" > Name : {{$admin->name}} </li>
                        <li class="list-group-item">
                                @if($admin->admin)
                                    <h3><span class="label label-success">Admin</span></h3>
                                @else
                                    <h3><span class='label label-default'>Member</span></h3>
                                @endif
                        </li>
                        <li class="list-group-item">Email : {{$admin->email}}</li>
                        @if(!empty($user->institution))
                            <li class="list-group-item">Institution : {{$admin->institution}}</li>
                        @endif
                        <li class="list-group-item"> Blog Posts : {{$posts}}</li>
                        <li class="list-group-item"> Ragistered :
                        <?php 
                            $diff = Carbon\Carbon::parse($admin->created_at)->diffInYears(Carbon\Carbon::now());
                            if($diff <= 2){
                                $diff = Carbon\Carbon::parse($admin->created_at)->diffInMonths(Carbon\Carbon::now());
        
                                if($diff < 1){
                                    $diff = Carbon\Carbon::parse($admin->created_at)->diffInDays(Carbon\Carbon::now());
        
                                    if($diff <= 1){
                                        echo "Today";
                                    }
                                    else{
                                        if($diff > 1)
                                            $ago = ' Days Ago';
                                        else {
                                            $ago = ' Day Ago';
                                        }
                                        echo $diff . $ago;
                                    }
                                }
                                else {
                                    if($diff > 1)
                                            $ago = ' Months Ago';
                                        else {
                                            $ago = ' Month Ago';
                                        }
                                    echo $diff . $ago;
                                }
                            }
                            else{
                                echo $diff . " Years Ago";
                            }
                        ?>
                        </li>
                    <div>
                </ul>
                <h5 class="card-footer"></h5>
            </div>
    </section>

@endsection