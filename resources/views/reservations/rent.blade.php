@extends('layouts.main')

@section('title')

  Rent

@stop

@section('content')
{{-- Laravel Calendar via github @makzumi --}}

    <div class="container">
        <div class="row">
            <div>
                <!-- Display Product to Rent -->
                <div class="container-fluid" style="margin: 10px"> {{--Row Container--}}
                 <div class="row">
                      <div class="col-md-6"> {{--Product Photo Carousel--}}
                       <div id="productPhotosCarousel{!!$product->id!!}" class="carousel slide">
                           <!-- Indicators -->
                           <ol class="carousel-indicators">
                             <li data-target="#productPhotosCarousel{!!$product->id!!}" data-slide-to="0" class="active"></li>
                             <li data-target="#productPhotosCarousel{!!$product->id!!}" data-slide-to="1"></li>
                             <li data-target="#productPhotosCarousel{!!$product->id!!}" data-slide-to="2"></li>
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
                           <a class="left carousel-control" href="#productPhotosCarousel{!!$product->id!!}" role="button" data-slide="prev">
                             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                             <span class="sr-only">Previous</span>
                           </a>
                           <a class="right carousel-control" href="#productPhotosCarousel{!!$product->id!!}" role="button" data-slide="next">
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
                          </div>
                      </div> {{--End Product Rates--}}
                 </div>
              </div> {{--End Row Container--}}
            </div>
        </div>


        <div class="row">
            <div class="col m6 s12 offset-m3">
                {{-- <form> --}}
                {{-- <div class="card-panel"> --}}
                    <div class="row">
                        <div class="col m5 s12">

                            {!! Form::model($product, array('route' => ['products.calendar.update', $product->id, $calendar->id], 'method' => 'PUT')) !!}
                                <div class='form-group'>
                                  {!! Form::label('reservation_length', 'Hour') !!}
                                  {!! Form::radio('reservation_length', 'rent_by_hour', true) !!}
                                  {!! Form::label('reservation_length', 'Day') !!}
                                  {!! Form::radio('reservation_length', 'rent_by_day') !!}
                                  {!! Form::label('reservation_length', 'Week') !!}
                                  {!! Form::radio('reservation_length', 'rent_by_week') !!} 
                                  {!! Form::label('reservation_length', 'Month') !!}
                                  {!! Form::radio('reservation_length', 'rent_by_month') !!} </br>
                                  {!! Form::label('start_date', 'From') !!}
                                  {!! Form::input('date', 'start_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                                  {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}

                            {{-- <div class="input-field">
                                <label for="start_dt">Check-in date</label>
                                <input input-date type="text" id="start_dt" ng-model="search_param.start_dt"  format="d-m-yyyy"/>
                            </div> --}}
                        </div>



                        <div class="col m5 s12">
                            {{-- {!! Form::label('name', 'To') !!} --}}
                            {{-- {!! Form::input('date', 'start_dt', date('Y-m-d'), ['class' => 'form-control']) !!} --}}
                            {{-- <div class="input-field">
                                <label for="end_dt">Check-in date</label>
                                <input input-date type="text" id="end_dt" ng-model="search_param.end_dt"  format="d-m-yyyy"  />
                            </div> --}}
                        </div>
                       {{--  <div class="col m2 s12">
                            <label for="occupancy">Persons</label>
                            <select class="" id="occupancy" ng-model="search_param.min_occupancy" material-select> --}}
                                {{-- <option ng-repeat="value in select_occupancy" value="{{value}}">{{value}}</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col m4 offset-m4">
                            {{-- <button ng-click="search()" class="btn btn-primary">Search</button> --}}
                        </div>
                    </div>
                    <div class="row"> {{-- Calendar --}}
                        <div class="col m4 offset-m4">
                          
                        </div>
                    </div>
                 {{-- </div> --}}
                {{-- </form> --}}
            </div>
        </div>

        {{-- <div class="row"> --}}
            {{-- <div class="col s12 m6" ng-repeat = "room_type in available_room_types"> --}}
                {{-- <div class="card blue-grey darken-1"> --}}
                    {{-- <div class="card-content white-text"> --}}
                        {{-- <span class="card-title">{{room_type.name}}</span> --}}
                        {{-- <p>Total price : {{room_type.total_price}}</p> --}}
                    {{-- </div> --}}
                    {{-- <div class="card-action"> --}}
                        {{-- <a href="" ng-click="book($index)" class="btn btn-primary" >Book this</a> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
@stop