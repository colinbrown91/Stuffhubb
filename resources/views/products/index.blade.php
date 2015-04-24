@extends('layouts.main')
@section('content')

<h2>All Products</h2>
	<!-- blade way to iterate through todo_lists -->
	@foreach ($products as $product)
		<h4>{!! link_to_route('products.show', $product->product_name, [$product->id] ) !!}</h4>
		<ul class = "no-bullet button-group">
			<li>
				{!! link_to_route('products.edit' , 'Edit' , [$product->id] , ['class'=>'tiny button'])!!}
			</li>
			<li>
				{!! Form::model($product, ['route'=> ['products.destroy', $product->id], 'method' => 'delete']) !!}
					{!! Form::button('Delete', ['type'=>'submit', 'class'=>'tiny alert button'])!!}
				{!! Form::close() !!}
			</li>
				
		</ul>
	@endforeach

@endsectionA