@extends('app')

@section('title')

  New Lister

@stop

@section('content')


<!-- xxxxxxxxxxxxxxx -->
<!-- Start Container -->
<!-- xxxxxxxxxxxxxxx -->


      <div class="container">
         

<!-- xxxxxxxxxxxxxxx -->
<!-- New Lister Form -->
<!-- xxxxxxxxxxxxxxx -->


         <div class="row">
            <div class="col-xs-2">
               <nav role="navigation">
                  <ul class="nav nav-pills nav-stacked">
                     <li role="presentation" class="active"><a href="#">Home</a></li>
                     <li role="presentation"><a href="#">Profile</a></li>
                     <li role="presentation"><a href="#">Messages</a></li>
                  </ul>
               </nav>
            </div>


            <div class="col-xs-8 panel panel-default">
               <div class="panel-body">
                  <form class="form-horizontal">
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                           <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                           <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <div class="checkbox">
                              <label>
                                 <input type="checkbox"> Remember me
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-xs-2"></div>
         </div>
         

<!-- xxxxxxxxxxxxx -->
<!-- End Container -->
<!-- xxxxxxxxxxxxx -->


         </div>


@stop
