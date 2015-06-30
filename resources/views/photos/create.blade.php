@extends('layouts.main')
@section('content')

	<h2> {!! $product->product_name !!} </h2>
	<h2> {!! $product->price !!} </h2>

	{!! Form::open(array('route' => ['products.photos.store', $product->id], 'id' => 'photoUpload', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}
		<div class='form-group'>
			{{-- @include('photos.partials._form') --}}
			{!! Form::file('file_0', null, ['class' => 'form-control', 'id' => 'photoInput']) !!}
			<input type="file" id="photoInput">
			{!! $errors->first('file_0', '<small class="error">:message</small>') !!}
			{!! Form::submit('Submit', ['class' => 'button']) !!}
		</div>
	{!! Form::close() !!}

	<div id="photoDisplay">

	</div>
	
	{!! Html::script('/js/vendor/jquery.js') !!}
	{!! Html::script('js/photos/display_photos.js') !!}


@endsection