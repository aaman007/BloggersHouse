@extends('layouts.app')
@section('content')

        @if(Auth::guest())
                <div class="jumbotron text-center bg-white">
                <h1>{{$title}}</h1>
                <p>This is the greatest laravel project on planet earth</p>
                <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
                </div>
        @else
            <div class="justify-content-center text-center">
                <h1 style="font-family=arial;font-weight:bold;color:#133252;font-size:45px;">CodeVille</h1>
                <h4 style="color:#7B8087;">An Online Contest Platform</h4>
                <hr>
            </div>

            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://i.imgur.com/9wpk0uZ.png" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                    <img src="https://i.imgur.com/7IJjOzS.jpg"  width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                    <img src="https://i.imgur.com/hwKmkmV.jpg"  width="1100" height="500">
                  </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>

              <br><br><br>

              <div class="row justify-content-center">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="float-right" src="https://sustcseoj.com/_Others/home-pic.png" width="400" height="250">
                        </div>
                        <div class="col-sm-6">
                            <div class="float-left" style="margin-left:10px;">
                                <h1 style="color:#7B8087;margin-top:15px;">Upcoming !!!</h1>
                                <hr>
                                <h5>No upcoming events</h5>
                            </div>
                        </div>
                    </div>
              </div>

              <hr>

              <div class="row justify-content-center text-center">
                <div class="col-sm-4">
                    <h2>Contests</h2>
                    <p>The CodeVille Online Judge holds contests on a 
                        regular basis. Check the contest page to find out about all 
                        running and past contest. Get in touch with us to host your contest at 
                        SourceCode Online Judge. 
                        go to contest</p>
                </div>
                <div class="col-sm-4">
                    <h2> About</h2>
                    <p>CodeVille Online Judge is developed by Dept. 
                        of Computer Science Engineering, Metropolitan University. 
                        It is still under development 
                        and running in α version.
                        This project still needs lots of improvement. 
                        Any suggestion will be appreciated. Happy Coding...</p>
                </div>
                <div class="col-sm-4">
                    <h2>Notice</h2>
                    <p>No available notice.

                        To report any bug or improvements please mail us [mail1,mail2]. 
                        We will try to fix or implement as soon as possible.</p>
                </div>
              </div>
        @endif
    

@endsection
