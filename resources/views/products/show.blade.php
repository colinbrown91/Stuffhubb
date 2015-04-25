@extends('layouts.main')
@section('content')

	<div>
		<h2> {!! $product->product_name !!} </h2>
		<h2> {!! $product->price !!} </h2>
		<p> {!! link_to_route('products.index', 'back', null, ['class' => 'small button']) !!} </p>
	</div>

@endsection