@extends('layouts.main')
@section('content')

	<h2> {!! $product->product_name !!} </h2>
	<h2> {!! $product->price !!} </h2>

	{!! Form::open(array('route' => ['products.photos.store', $product->id], 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}
		<div class='form-group'>
			@include('photos.partials._form')
		</div>
	{!! Form::close() !!}

	<div class="row" id="photoEdit">
		<div class="small-10 columns" id="photoDisplay">

		</div>
		<div class="small-2 columns" id="photoAcceptable">
			<div class="row">
				<div class="small-1 columns" id="photoAcceptable">
					<i class="fi-check" style="font-size:36px; color:#33CC33"> </i>
				</div>
				<div class="small-1 columns" id="photoAcceptable">
					<i class="fi-x-circle" style="font-size:36px; color:#FF0000"></i>
				</div>
			</div> 
			<div class="row">
				<div class="small-1 columns" id="photoAcceptable">
					<i class="fi-check" style="font-size:36px; color:#145214"> </i>
				</div>
				<div class="small-1 columns" id="photoAcceptable">
					<i class="fi-x-circle" style="font-size:36px; color:#800000"></i>
				</div>
			</div> 
		</div>
	</div>


@endsection