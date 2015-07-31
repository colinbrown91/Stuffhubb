@extends('layouts.main')
@section('content')

<h2>All Products</h2>

	<!-- blade syntax iterate through products -->
	@foreach ($products as $product)
		<h4>{!! link_to_route('user.products.show', $product->product_name, [$user->id, $product->id] ) !!}</h4>
		<ul class = "no-bullet button-group">
			<li>
				{!! link_to_route('user.products.edit' , 'Edit' , [$user->id, $product->id] , ['class'=>'tiny button'])!!}
			</li>
			<li>
				{!! Form::model($product, ['route'=> ['user.products.destroy', $user->id, $product->id], 'method' => 'DELETE']) !!}
					{!! Form::button('Delete', ['type'=>'submit', 'class'=>'tiny alert button'])!!}
				{!! Form::close() !!}
			</li>
				
		</ul>

	@endforeach

	{{-- Button for creating a new Product --}}
	{{-- wit link to the create view --}}
	{!! link_to_route('user.products.create', 'Create New Product', [$user->id], ['class' => 'success button']) !!}

@endsection