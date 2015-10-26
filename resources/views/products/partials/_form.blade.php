{!! Form::label('name', 'Product Name') !!}
{!! Form::text('product_name', 'Product Name', ['class' => 'form-control']) !!}

{!! Form::label('name', 'Product Address') !!}
{!! Form::text('product_street', 'Street', ['class' => 'form-control']) !!}
{!! Form::text('product_city', 'City', ['class' => 'form-control']) !!}
{!! Form::text('product_state', 'State', ['class' => 'form-control']) !!}
{!! Form::text('product_zipcode', 'Zipcode', ['class' => 'form-control']) !!}

{!! Form::label('name', 'Product Base Price per Hour') !!}
{!! Form::text('base_price_per_hour', '$/Hour', ['class' => 'form-control']) !!}

{!! Form::label('name', 'Product Base Price per Day') !!}
{!! Form::text('base_price_per_day', '$/Day', ['class' => 'form-control']) !!}

{!! Form::label('name', 'Product Base Price per Week') !!}
{!! Form::text('base_price_per_week', '$/Week', ['class' => 'form-control']) !!}

{!! Form::label('name', 'Product Base Price per Month') !!}
{!! Form::text('base_price_per_month', '$/Month', ['class' => 'form-control']) !!}

{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_hour', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_day', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_week', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price_per_month', '<small class="error">:message</small>') !!}

{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}