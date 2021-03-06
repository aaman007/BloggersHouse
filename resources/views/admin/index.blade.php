@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/admin-panel"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$posts}}</h3>
  
                <p>Posts</p>
                <div class="icon">
                  <i class="fa fa-edit"></i>
                </div>
              </div>
              <a href="/admin-panel/posts" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6 ">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$announcements}}<sup style="font-size: 20px"></sup></h3>
                <p>Announcements</p>
                <div class="icon">
                  <i class="fa fa-bullhorn"></i>
                </div>
              </div>
              <a href="/admin-panel/announcements" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$users}}</h3>
  
                <p>Users</p>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
              <a href="/admin-panel/users" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$admins}}</h3>
  
                <p>Admins</p>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
              <a href="/admin-panel/admins" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
             <!-- Map box -->
             <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                            title="Date range">
                      <i class="fa fa-calendar"></i></button>
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                            data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                      <i class="fa fa-minus"></i></button>
                  </div>
                  <!-- /. tools -->
    
                  <i class="fa fa-map-marker"></i>
    
                  <h3 class="box-title">
                    Visitors
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>
                <!-- /.box-body-->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-1"></div>
                      <div class="knob-label">Visitors</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-2"></div>
                      <div class="knob-label">Online</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <div id="sparkline-3"></div>
                      <div class="knob-label">Exists</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
              <!-- /.box -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
  
            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
              <div class="box-header">
                <i class="fa fa-calendar"></i>
  
                <h3 class="box-title">Calendar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-black">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- Progress bars -->
                    <div class="clearfix">
                      <span class="pull-left">Task #1</span>
                      <small class="pull-right">90%</small>
                    </div>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                    </div>
  
                    <div class="clearfix">
                      <span class="pull-left">Task #2</span>
                      <small class="pull-right">70%</small>
                    </div>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="clearfix">
                      <span class="pull-left">Task #3</span>
                      <small class="pull-right">60%</small>
                    </div>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                    </div>
  
                    <div class="clearfix">
                      <span class="pull-left">Task #4</span>
                      <small class="pull-right">40%</small>
                    </div>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.box -->
  
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
  
      </section>
      <!-- /.content -->
@endsection