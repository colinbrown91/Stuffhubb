@extends('layouts.main')
@section('content')

	<div>
		<h2> {!! $product->product_name !!} </h2>
		<h2> {!! $product->price !!} </h2>
		{{-- <img src='$product->picture_url_0' /> --}}
		{{-- <p> {!! image('$product->picture_url_0') !!} </p> --}}
		@foreach ($photos as $photo)
			<div class="col-md-2">
				<div class="thumbnail">
				{{-- <p> {{route('products.photos.getphoto', [$photo->filename, $product->id, $photo->id])}} </p> --}}
					<img src="{!! route('products.photos.getphoto', $photo->id) !!}" alt="ALT NAME" class="img-responsive"/>
					<div class="caption">
						<p>{!! $photo->original_filename !!}</p>
						<p>{!! $photo->mime !!} </p>
							<ul>
								<li>
									{!! Form::model($photo, ['route' => ['products.photos.destroy', $product->id, $photo->id], 'method' => 'DELETE' ]) !!}
                						{!! Form::button('destroy', ['type' => 'submit', 'class' => 'tiny alert button']) !!}
            						{!! Form::close() !!}
								</li>
							</ul>
					</div>
				</div>
			</div>
		@endforeach
		<p> {!! link_to_route('products.photos.create', 'add picture', [$product->id], ['class' => 'button success'])  !!} </p>
		<p> {!! link_to_route('products.index', 'back', null, ['class' => 'small button']) !!} </p>
	</div>

@endsection