@extends('layouts.main')
@section('content')

	{!! Form::open(array('route' => 'products.store')) !!}
		<div class='form-group'>
			@include('products.partials.__form')
		</div>
	{!! Form::close() !!}

@endsection