@extends('layouts.main')

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
            <div>
               <!-- blade syntax iterate through products -->
               @foreach ($products as $productIndex => $product)
                  <div class="container-fluid" style="margin: 10px"> {{--Row Container--}}
                     <div class="row">
                          <div class="col-md-6"> {{--Product Photo Carousel--}}
                           <div id="productPhotosCarousel{!!$productIndex!!}" class="carousel slide">
                               <!-- Indicators -->
                               <ol class="carousel-indicators">
                                 <li data-target="#productPhotosCarousel{!!$productIndex!!}" data-slide-to="0" class="active"></li>
                                 <li data-target="#productPhotosCarousel{!!$productIndex!!}" data-slide-to="1"></li>
                                 <li data-target="#productPhotosCarousel{!!$productIndex!!}" data-slide-to="2"></li>
                               </ol>
                               <!-- Wrapper for slides -->
                               <div class="carousel-inner" role="listbox" style="width: 320px; height: 320px; margin: auto">
                                 @foreach ($product->productPhotos as $index => $photo)
                                          <div class="item @if ($index==0) {!! 'active' !!} @endif" >
                                       <img src="{!! route('user.products.photos.getphoto', $photo->id) !!}" alt="ALT NAME" class="img-responsive" style="margin: auto"/>
                                       </div>
                                 @endforeach
                               </div>
                               <!-- Left and right controls -->
                               <a class="left carousel-control" href="#productPhotosCarousel{!!$productIndex!!}" role="button" data-slide="prev">
                                 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>
                               </a>
                               <a class="right carousel-control" href="#productPhotosCarousel{!!$productIndex!!}" role="button" data-slide="next">
                                 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                 <span class="sr-only">Next</span>
                               </a>
                           </div>
                          </div> {{--End Product Photo Carousel--}}
                          <div class="col-md-3"> {{--Product Description--}}
                           <div class="caption">
                                   
                                   <ul class="list-unstyled">
                                      <li><strong>Rating:</strong> 4.78/5</li>
                                      <li><strong>Address:</strong> {!!$product->product_street!!} {!!$product->product_city!!}, {!!$product->product_state!!} {!!$product->product_zipcode!!}</li>
                                      <li><strong>Hours:</strong> M-F 9-5; Sat 10-3;</li>
                                      <li><strong>Categories:</strong> Kayak, Paddleboard</li>
                                      <li><strong>Brands:</strong> Delta, North Shore Sea Kayaks</li>
                                   </ul>
                              </div>
                          </div> {{--End Product Description--}}
                          <div class="col-md-3"> {{--Product Rates--}}
                              <div class="caption">
                                 <h4>Rate</h4>
                                   <ul class="list-unstyled">
                                      <li><strong>${!!$product->base_price_per_hour!!}/Hour</strong></li>
                                    <li><strong>${!!$product->base_price_per_day!!}/Day</strong></li>
                                    <li><strong>${!!$product->base_price_per_week!!}/Week</strong></li>
                                    <li><strong>${!!$product->base_price_per_month!!}/Month</strong></li>
                                   </ul>
                                   <p><a href="#" class="btn btn-primary" role="button">Browse</a></p>
                              </div>
                          </div> {{--End Product Rates--}}
                     </div>
                  </div> {{--End Row Container--}}
               @endforeach <!-- End iterate through products -->
            </div>
         </div>


<!-- xxxxxxxxxxxxx -->
<!-- End Container -->
<!-- xxxxxxxxxxxxx -->


         </div>


@stop
