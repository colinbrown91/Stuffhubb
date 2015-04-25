@extends('layouts.main')
@section('content')

	{!! Form::open(array('route' => 'products.store')) !!}
		<div class='form-group'>
			@include('products.partials._form')
		</div>
	{!! Form::close() !!}

@endsection