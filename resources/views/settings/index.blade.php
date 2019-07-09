@extends('layouts.app')

@section('content')
    <div class="card text-center">
        <h3 class="card-header">Settings</h3>

        <div class="card-body">
            {!!Form::open(['action' => ['SettingController@update',$user->id] , 'method' => 'POST'])!!}
            <table class="table table-striped">
                <tr>
                    <th>Name  </th>
                    <th> {{Form::text('name',$user->name,['class' => 'form-control'])}} </th>
                </tr>
                <tr>
                    <th>Email  </th>
                    <th> {{Form::email('email',$user->email,['class' => 'form-control' , 'disabled'])}} </th>
                </tr>
                <tr>
                    <th>Institution  </th>
                    <th> {{Form::text('institution',$user->institution,['class' => 'form-control' , 'placeholder' => 'Institution Name'])}} </th>
                </tr>
                <tr>
                    <th>New Password  </th>
                    <th> {{Form::password('oldPassword',['class' => 'form-control','placeholder' => 'Old Password'])}} </th>
                </tr>
                <tr>
                    <th>New Password  </th>
                    <th> {{Form::password('newPassword',['class' => 'form-control','placeholder' => 'New Password'])}} </th>
                </tr>
            </table>
            <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    You must enter your current password to update the profile
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save Changes',['class' => 'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
        <h3 class="card-footer"></h3>
    </div>
@endsection