@extends('layouts.main')

@section('title')

  Dashboard

@stop

@section('content')
       

<!-- xxxxxxxx -->
<!-- Side Nav -->
<!-- xxxxxxxx -->

         
         <div class="row">
            <div class="col-xs-2">
               <nav role="navigation">
                  <ul class="nav nav-pills nav-stacked">
                     <li role="presentation" class="active"><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                     <li role="presentation"><a href="/profile"><i class="fa fa-building"></i> Profile</a></li>
                     <li role="presentation"><a href="/account"><i class="fa fa-user"></i> Account</a></li>
                     <li role="presentation"><a href="/transactions"><i class="fa fa-th-list"></i> Transactions</a></li>
                     <li role="presentation"><a href="/performance"><i class="fa fa-area-chart"></i> Performance</a></li>
                     <li role="presentation"><a href="/settings"><i class="fa fa-wrench"></i> Settings</a></li>
                     <li role="presentation"><a href="/help"><i class="fa fa-life-ring"></i> Help</a></li>
                  </ul>
               </nav>
            </div> 
         

<!-- xxxxxxxxx -->
<!-- Dashboard -->
<!-- xxxxxxxxx -->


        <div class="col-xs-10">
          <div class="well">
            

            <h3>Settings:</h3>
            

          </div>
        </div>


@stop
