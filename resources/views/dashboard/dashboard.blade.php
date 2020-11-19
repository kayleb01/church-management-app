@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      
<section class="content">
<div class="alert-field" id="alert-field"></div>   
    <div class="row">
      <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">People</span>
                        <span class="info-box-number">
                            <span>0</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Families</span>
                        <span class="info-box-number">
                            0
                        </span>
                    </div>
                </div>
            </div>
                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-user-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Groups</span>
                        <span class="info-box-number">
                            <span>0</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-calendar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>New People</b> This month</span>
                        <span class="info-box-number">
                            <span>0</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-calendar-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Birthdays</b> Today</span>
                        <span class="info-box-number">
                            <span>0</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-handshake-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Done Follow Ups</b> This Month</span>
                        <span class="info-box-number">
                            <span>0</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fa fa-money"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Contributions</b> Last week</span>
                        <span class="info-box-number">                             
                            <span>NGN0</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- <div class="row"> -->
                   <!--  <div class="col-md-10"> -->
                        <div class="card">
                        <div class="card-header with-border">
                            <h3 class="card-title">My pending follow ups this month</h3>
                        </div>
                        <div class="card-body">
                            <p>
                            </p>
                        </div>
                    </div></div>
                <!--</div> End of col-md-8 -->
            <!--</div> End of row-->
            <!-- <div class="row"> -->
                <div class="col-md-6">                
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">Upcoming events in 30 days</h3> <span><a href="#" class="pull-right link">View all</a></span>
                            </div>
                            <div class="card-body">
                                <p>
                            
                                </p>
                            </div>
                        </div>
                </div>
            
        </div>
            
            <!--     -->
    </div><!-- End of Col-md-12-->
    </div>
</div>
@endsection