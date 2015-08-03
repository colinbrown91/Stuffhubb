@extends('app')

@section('title')

  Search

@stop

@section('content')


<!-- xxxxxxxxxxxxxxx -->
<!-- Start Container -->
<!-- xxxxxxxxxxxxxxx -->


      <div class="container">
         

<!-- xxxxxxxxxxx -->
<!-- Filter Menu -->
<!-- xxxxxxxxxxx -->


         <div class="row">
            <div class="panel panel-default">
               <div class="panel-body">
                  <form class="form-inline">
                     <div class="form-group">
                        <label for="exampleInputName2">Zip code</label>
                        <input type="text" class="form-control" id="InputZipcode" placeholder="60604">
                     </div>
                     <div class="form-group">
                        <label for="InputDate">Pick up</label>
                        <input type="date" class="form-control" id="InputDate" placeholder="mm/dd/yyyy">
                        <input type="time" class="form-control" placeholder="Time">
                     </div>
                     <div class="form-group">
                        <label for="InputDate">Drop off</label>
                        <input type="date" class="form-control" id="InputDate" placeholder="mm/dd/yyyy">
                        <input type="time" class="form-control" placeholder="Time">
                     </div>

                     <button type="" class="btn btn-default">More Filters</button>
                  </form>
               </div>
            </div>
         </div>
         

<!-- xxxxxxxxxxxxxx -->
<!-- Search Results -->
<!-- xxxxxxxxxxxxxx -->


         <div class="row">
            <div class="col-md-4">
               <div class="thumbnail">
                  <img src="http://placehold.it/350x175" alt="">
                  <div class="caption">
                     <h2>Kayak Co.</h2>
                     <ul class="list-unstyled">
                        <li><strong>Rating:</strong> 4.78/5</li>
                        <li><strong>Address:</strong> 123 Main St, Chicago, IL 60604</li>
                        <li><strong>Hours:</strong> M-F 9-5; Sat 10-3;</li>
                        <li><strong>Categories:</strong> Kayak, Paddleboard</li>
                        <li><strong>Brands:</strong> Delta, North Shore Sea Kayaks</li>
                     </ul>
                     <hr>
                     <h4>Inventory</h4>
                     <ul class="list-unstyled">
                        <li><strong>Item:</strong> Rate</li>
                        <li><strong>Item:</strong> Rate</li>
                        <li><strong>Item:</strong> Rate</li>
                        <li><strong>Item:</strong> Rate</li>
                     </ul>
                     <hr>
                     <p><a href="#" class="btn btn-primary" role="button">Browse</a></p>
                  </div>
               </div>
            </div>
          </div>


<!-- xxxxxxxxxxxxx -->
<!-- End Container -->
<!-- xxxxxxxxxxxxx -->


         </div>


@stop
