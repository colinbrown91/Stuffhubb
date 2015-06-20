@extends('layouts.main')
@section('content')

	{!! Form::open(array('route' => 'products.store')) !!}
		<div class='form-group'>
			@include('products.partials._form')
		</div>
	{!! Form::close() !!}


{{-- 	{!! Form::open(array('route' => 'products.files.store')) !!}
		<div class='form-group'>
			@include('files.partials._form')
		</div>
	{!! Form::close() !!} --}}

@endsection