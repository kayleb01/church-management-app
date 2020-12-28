@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    <section class="content">
    @if(Auth::user()->confirmed != 1)
        <div class="alert-danger p-3 rounded shadow-sm m-2 text-center">
            <span class="font-weight-bold">You've not been confirmed by the admin yet, you'll not be able to see the Organization's details</span>    
        </div>   
     @endif
        <div class="row">
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                    <div class="info-box shadow">
                    <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">People</span>
                            <span class="info-box-number">
                                <span><a href="/people">{{$people}}</a></span>
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
                                <span><a href="/view/group"> {{$group}}</a></span>
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
                                <span><td>0</td></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
                    <div class="info-box shadow">
                    <span class="info-box-icon bg-info"><i class="fa fa-calendar-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Birthdays</b> this month</span>
                            <span class="info-box-number">
                                <span>{{count($people_birth)}}</span>
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
                                <span>NGN 0</span>
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
                            <table class="table table-sm">
                                <tbody>
                                @foreach($followups as $follow)
                                    <tr>
                                    
                                        <td>
                                        <h4 class="font-weight-bold"> <a href="/people/{{$follow->people->id}}">{{$follow->people->first_name}} {{$follow->people->last_name}}</a> </h4>
                                        <span>{{$follow->date}}</span><br>
                                        <span>{{$follow->people->mobile_number}}</span>
                                        </td>
                                        <td>
                                            <button class="border border-secondary"> <i class="fa fa-check"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                
                            </div>
                        </div>
                    </div>
                    
                <!-- <upcoming events> -->
                <Upcoming-event><Upcoming-event>
            </div>
                
                <!--     -->
        </div><!-- End of Col-md-12-->
        </div>
  </div>
@endsection