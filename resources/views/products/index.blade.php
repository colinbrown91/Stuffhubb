@extends('layouts.main')
@section('content')

<h2>All Products</h2>

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
		                 <h4>{!! link_to_route('user.products.show', $product->product_name, [$user->id, $product->id] ) !!}</h4>
		                 <ul class="list-unstyled">
		                    <li><strong>Rating:</strong> 4.78/5</li>
		                    <li><strong>Address:</strong> {!!$product->product_street!!} {!!$product->product_city!!}, {!!$product->product_state!!} {!!$product->product_zipcode!!}</li>
		                    <li><strong>Hours:</strong> M-F 9-5; Sat 10-3;</li>
		                    <li><strong>Categories:</strong> Kayak, Paddleboard</li>
		                    <li><strong>Brands:</strong> Delta, North Shore Sea Kayaks</li>
		                    <li>{!! link_to_route('user.products.edit' , 'Edit' , [$user->id, $product->id] , ['class'=>'btn btn-primary form-control'])!!}</li>
							<li>
								{!! Form::model($product, ['route'=> ['user.products.destroy', $user->id, $product->id], 'method' => 'DELETE']) !!}
									{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-primary form-control'])!!}
								{!! Form::close() !!}
							</li>
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

	{{-- Button for creating a new Product --}}
	{{-- wit link to the create view --}}
	{!! link_to_route('user.products.create', 'Create New Product', [$user->id], ['class' => 'btn btn-primary']) !!}

@endsection