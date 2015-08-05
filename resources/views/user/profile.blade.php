@extends('layouts.main')

@section('title')

  Profile

@stop

@section('content')
       

<!-- xxxxxxxx -->
<!-- Side Nav -->
<!-- xxxxxxxx -->

         
         <div class="row">
            <div class="col-md-2">
               <nav role="navigation">
                  <ul class="nav nav-pills nav-stacked">
                     <li role="presentation" class="active">{!! Html::decode(link_to_route('user.show', '<i class="fa fa-dashboard"></i> Dashboard', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.getprofile', '<i class="fa fa-building"></i> Profile', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.getaccount', '<i class="fa fa-user"></i> Account', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.gettransactions', '<i class="fa fa-th-list"></i> Transactions', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.getperformance', '<i class="fa fa-area-chart"></i> Performance', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.getsettings', '<i class="fa fa-wrench"></i> Settings', [$user->id] )) !!}</li>
                     <li role="presentation">{!! Html::decode(link_to_route('user.gethelp', '<i class="fa fa-life-ring"></i> Help', [$user->id] )) !!}</li>
                  </ul>
               </nav>
            </div> 
         

<!-- xxxxxxx -->
<!-- Profile -->
<!-- xxxxxxx -->


        <div class="col-md-10">
          <div class="well">
            

            <div class="row">
              <div class="col-md-3">
                <img src="http://placehold.it/350x175" alt="">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-block">Upload Image</button>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <h3>Business Info:</h3>
                <form class="form-horizontal">

                  <div class="form-group">
                    <label for="ListerName" class="col-md-2 control-label">Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="ListerName" placeholder="Business Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ListerAddress" class="col-md-2 control-label">Address</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="ListerAddress" placeholder="Street">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <input type="text" class="form-control" id="ListerCity" placeholder="City">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <input type="text" class="form-control" id="ListerState" placeholder="State">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <input type="text" class="form-control" id="ListerZip" placeholder="Zip">
                    </div>
                  </div>

                </form>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <h3>Business Contact:</h3>
                <form class="form-horizontal">

                  <div class="form-group">
                    <label for="ListerName" class="col-md-2 control-label">Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="ListerFirstName" placeholder="First">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <input type="text" class="form-control" id="ListerLastName" placeholder="Last">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ListerName" class="col-md-2 control-label">Gender</label>
                    <div class="col-md-6">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Male
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Female
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ListerName" class="col-md-2 control-label">DoB</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="ListerFirstName" placeholder="Month">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-4">
                      <input type="text" class="form-control" id="ListerCity" placeholder="Day">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-4">
                      <input type="text" class="form-control" id="ListerState" placeholder="Year">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ListerEmail" class="col-md-2 control-label">Email</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="ListerEmail" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ListerPhone" class="col-md-2 control-label">Phone</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="ListerFirstName" placeholder="(***) ***-*****">
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>

           

          </div>
        </div>


@stop
