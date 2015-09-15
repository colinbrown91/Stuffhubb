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

	{!! Form::open(array('route' => ['user.products.update', $user->id, $product->id], 'method' => 'PUT')) !!}
		<div class='form-group'>
			@include('products.partials._form_with_product')
		</div>
	{!! Form::close() !!}

		
	<ul class="list-unstyled">
		<li>{!! link_to_route('user.products.show' , 'Overview' , [$user->id, $product->id] , ['class'=>'btn btn-primary'])!!}</li>
		<li>
			{!! Form::model($product, ['route'=> ['user.products.destroy', $user->id, $product->id], 'method' => 'DELETE']) !!}
				{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
			{!! Form::close() !!}
		</li>
		<li> {!! link_to_route('user.products.index', 'Back', [$user->id], ['class' => 'btn btn-primary']) !!} </li>
	</ul>

	

@endsection