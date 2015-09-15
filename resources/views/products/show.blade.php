@extends('layouts.main')
@section('content')
	
	<h2> {!! $product->product_name !!} </h2>

	<div class="container-fluid" style="margin: 10px">
		<div class="row">
			@foreach ($photos as $photoIndex => $photo)
				<div class="col-md-4" style="text-align: center">
					<div class="thumbnail">
						<img src="{!! route('user.products.photos.getphoto', $photo->id) !!}" alt="ALT NAME" class="img-responsive" style="margin: auto"/>
						<p>Filename: {!! $photo->original_filename !!}</p>
						<p>Mimetype: {!! $photo->mime !!} </p>
						<ul class="list-unstyled">
							<li>
								{!! Form::model($photo, ['route' => ['user.products.photos.destroy', $user->id, $product->id, $photo->id], 'method' => 'DELETE']) !!}
            						{!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        						{!! Form::close() !!}
							</li>
						</ul>
					</div>
				</div>
			@endforeach
			<div class="col-md-4" style="text-align: center">
				@if($photos->count() < 3) 
					{!! link_to_route('user.products.photos.create', 'add picture', [$user->id, $product->id], ['class' => 'btn btn-primary'])  !!}
				@endif
			</div>
		</div>
	</div>

	<ul class="list-unstyled">
        <li><strong>Rating:</strong> 4.78/5</li>
        <li><strong>Address:</strong> {!!$product->product_street!!} {!!$product->product_city!!}, {!!$product->product_state!!} {!!$product->product_zipcode!!}</li>
        <li><strong>Hours:</strong> M-F 9-5; Sat 10-3;</li>
        <li><strong>Categories:</strong> Kayak, Paddleboard</li>
        <li><strong>Brands:</strong> Delta, North Shore Sea Kayaks</li>
       
     </ul>
     <div class="caption">
    	<h4>Rate</h4>
         <ul class="list-unstyled">
            <li><strong>${!!$product->base_price_per_hour!!}/Hour</strong></li>
            <li><strong>${!!$product->base_price_per_day!!}/Day</strong></li>
            <li><strong>${!!$product->base_price_per_week!!}/Week</strong></li>
            <li><strong>${!!$product->base_price_per_month!!}/Month</strong></li>
         </ul>
    </div>

		<h2> {!! $product->base_price !!} </h2>
		{{-- <img src='$product->picture_url_0' /> --}}
		{{-- <p> {!! image('$product->picture_url_0') !!} </p> --}}
		
		<ul class="list-unstyled">
			<li>{!! link_to_route('user.products.edit' , 'Edit' , [$user->id, $product->id] , ['class'=>'btn btn-primary'])!!}</li>
			<li>
				{!! Form::model($product, ['route'=> ['user.products.destroy', $user->id, $product->id], 'method' => 'DELETE']) !!}
					{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
				{!! Form::close() !!}
			</li>
			<li> {!! link_to_route('user.products.index', 'Back', [$user->id], ['class' => 'btn btn-primary']) !!} </li>
		</ul>

	

@endsection