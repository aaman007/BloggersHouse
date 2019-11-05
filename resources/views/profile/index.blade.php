@extends('layouts.app')

@section('content')

    <div class="card text-center" style="margin:0 auto;float:none;">

        <h3 class="card-header">Profile </h3>

        <ul class="list-group">
            <li class="list-group-item">
                <img style="margin-bottom:10px;width:450px;height:400px;" class="img-thumbnail  bg-secondary" src="/storage/profile_pictures/{{$user->profile_picture}}">
                {!!Form::open(['action' => ['ProfileController@update',$user->id],'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                    <div class="form-group">
                        {{Form::file('profile_picture')}}
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Change',['class' => 'btn btn-primary' , 'style' => 'margin-left:5px;'])}}
                    </div>
                {!!Form::close()!!}
            </li>

            <div style="font-family:Helvetica;font-weight:bold;font-size:17px;color:#0B3868;">
                <li class="list-group-item" > Name : {{$user->name}} </li>
                <li class="list-group-item">
                        @if($user->admin)
                            <h3><span class="badge badge-success">Admin</span></h3>
                        @else
                            <h3><span class='badge badge-secondary'>Member</span></h3>
                        @endif
                </li>
                <li class="list-group-item">Email : {{$user->email}}</li>
                @if(!empty($user->institution))
                    <li class="list-group-item">Institution : {{$user->institution}}</li>
                @endif
                <li class="list-group-item"> Blog Posts : {{count($posts)}}</li>
                <li class="list-group-item"> Ragistered :
                <?php 
                    $diff = Carbon\Carbon::parse($user->created_at)->diffInYears(Carbon\Carbon::now());
                    if($diff <= 2){
                        $diff = Carbon\Carbon::parse($user->created_at)->diffInMonths(Carbon\Carbon::now());

                        if($diff < 1){
                            $diff = Carbon\Carbon::parse($user->created_at)->diffInDays(Carbon\Carbon::now());

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
@endsection