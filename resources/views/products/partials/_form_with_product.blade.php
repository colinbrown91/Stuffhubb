{!! Form::label('name', 'Product Name') !!}
{!! Form::text('product_name', $product->product_name, ['class' => 'form-control']) !!}

{!! Form::label('address', 'Product Address') !!}
{!! Form::text('product_street', $product->product_street, ['class' => 'form-control']) !!}
{!! Form::text('product_city', $product->product_city, ['class' => 'form-control']) !!}
{!! Form::text('product_state', $product->product_state, ['class' => 'form-control']) !!}
{!! Form::text('product_zipcode', $product->product_zipcode, ['class' => 'form-control']) !!}

{!! Form::label('base_price_per_hour', 'Product Base Price per Hour') !!}
{!! Form::text('base_price_per_hour', $product->base_price_per_hour, ['class' => 'form-control']) !!}

{!! Form::label('base_price_per_day', 'Product Base Price per Day') !!}
{!! Form::text('base_price_per_day', $product->base_price_per_day, ['class' => 'form-control']) !!}

{!! Form::label('base_price_per_week', 'Product Base Price per Week') !!}
{!! Form::text('base_price_per_week', $product->base_price_per_week, ['class' => 'form-control']) !!}

{!! Form::label('base_price_per_month', 'Product Base Price per Month') !!}
{!! Form::text('base_price_per_month', $product->base_price_per_month, ['class' => 'form-control']) !!}

{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_hour', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_day', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_week', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_month', '<small class="error">:message</small>') !!}

{!! Form::submit('Submit', ['class' => 'button']) !!}