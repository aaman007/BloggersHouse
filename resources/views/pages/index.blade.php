@extends('layouts.app')
@section('content')

        @if(Auth::guest())
                <div class="jumbotron text-center bg-white">
                <h1>BloggersHouse</h1>
                <p>The Ultimate blogging website</p>
                <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
                </div>
        @else
            <div class="justify-content-center text-center">
                <h1 style="font-family=arial;font-weight:bold;color:#133252;font-size:45px;">BloggersHouse</h1>
                <h4 style="color:#7B8087;">An Online Blogging Platform</h4>
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
              
              <br><br>
              <hr>

              <div class="row justify-content-center text-center">
                <div class="col-sm-4">
                    <h2>Blogs</h2>
                    <p>The BloggersHouse provides best editing tools to use for your blogs and 
                      archives them to your profile.
                    </p>
                </div>
                <div class="col-sm-4">
                    <h2> About</h2>
                    <p>The BloggersHouse is an online blog portal where user can publish their
                        writtings with the best editing tools and publish them instantly.
                      Happy Blogging....</p>
                </div>
                <div class="col-sm-4">
                    <h2>Notice</h2>
                    <p>No available notice.

                        To report any bug or improvements please mail us.
                         [ bugs@bloggershouse.com ]</p>
                </div>
              </div>
        @endif
    

@endsection
