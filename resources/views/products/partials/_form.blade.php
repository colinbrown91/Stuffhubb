{!! Form::label('name', 'Product Title') !!}
{{-- Once this works try the below --}}
{{-- Try adding a float inside the form below --}}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! Form::submit('Submit', ['class' => 'button']) !!}