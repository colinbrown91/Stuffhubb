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
            

            <h3>Performance:</h3>
            <div class="row">
              <div class="col-xs-4">
                <div class="panel panel-primary text-center">
                  <div class="panel-heading">
                    <h3 class="panel-title">Revenue</h3>
                  </div>
                  <div class="panel-body">
                    <h4>$4,300</h4>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="panel panel-primary text-center">
                  <div class="panel-heading">
                    <h3 class="panel-title">Utilization</h3>
                  </div>
                  <div class="panel-body">
                    <h4>67.19%</h4>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="panel panel-primary text-center">
                  <div class="panel-heading">
                    <h3 class="panel-title">Transactions</h3>
                  </div>
                  <div class="panel-body">
                    <h4>86</h4>
                  </div>
                </div>
              </div>
            </div>


            <h3>Messages:</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Trans #</th>
                  <th>Renter</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>5/6/2015</td>
                  <td>9:46:05 AM</td>
                  <td>001</td>
                  <td>Kerry Kayak</td>
                  <td>Should I strech before I paddle?</td>
                </tr>
                <tr>
                  <td>5/6/2015</td>
                  <td>11:53:42 AM</td>
                  <td> - </td>
                  <td>Davey Dinghy</td>
                  <td>Do you provide PDFs?</td>
                </tr>
              </tbody>
            </table>


            <h3>Transactions:</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Trans #</th>
                  <th>Renter</th>
                  <th># Items</th>
                  <th>Total</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>5/6/2015</td>
                  <td>10:00 AM - 12:00 PM</td>
                  <td>001</td>
                  <td>Kerry Kayak</td>
                  <td>2</td>
                  <td>$100.00</td>
                  <td>4.5/5</td>
                </tr>
                <tr>
                  <td>5/6/2015</td>
                  <td>10:00 AM - 12:00 PM</td>
                  <td>001</td>
                  <td>Kerry Kayak</td>
                  <td>2</td>
                  <td>$100.00</td>
                  <td>4.5/5</td>
                </tr>
                <tr>
                  <td>5/6/2015</td>
                  <td>10:00 AM - 12:00 PM</td>
                  <td>001</td>
                  <td>Kerry Kayak</td>
                  <td>2</td>
                  <td>$100.00</td>
                  <td>4.5/5</td>
                </tr>
                <tr>
                  <td>5/6/2015</td>
                  <td>10:00 AM - 12:00 PM</td>
                  <td>001</td>
                  <td>Kerry Kayak</td>
                  <td>2</td>
                  <td>$100.00</td>
                  <td>4.5/5</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>


@stop
