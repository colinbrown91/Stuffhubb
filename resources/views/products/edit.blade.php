@extends('layouts.main')
@section('content')
	
	<!-- form model binding -->
	<!-- used model instead of open which is used in create -->
	<!-- added list and list id to the model function -->
	<!-- also added method of PUT due to route setup which can be seen in ssh -->
	{!! Form::model($product, array('route' => ['products.update', $product->id], 'method' => 'PUT')) !!}
		<div class='form-group'>
			@include('products.partials._form')
		</div>
	{!! Form::close() !!}

@stop