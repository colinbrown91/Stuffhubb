{!! Form::label('name', 'Product Title') !!}
{{-- Once this works try the below --}}
{{-- Try adding a float inside the form below --}}
{!! Form::text('product_name', null, ['class' => 'form-control']) !!}
{!! Form::text('base_price', null, ['class' => 'form-control']) !!}
{{-- {!! Form::file('file_0', null, ['class' => 'form-control']) !!} --}}
{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! $errors->first('base_price', '<small class="error">:message</small>') !!}
{{-- {!! $errors->first('file_0', '<small class="error">:message</small>') !!} --}}
{!! Form::submit('Submit', ['class' => 'button']) !!}