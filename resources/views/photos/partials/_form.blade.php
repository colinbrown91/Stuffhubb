{!! Form::label('file_0', 'Photo') !!} {{-- label gives id='file_0' to file form below --}}
{!! Form::file('file_0', null, ['class' => 'form-control', 'id' => 'photoInput']) !!}
{!! $errors->first('file_0', '<small class="error">:message</small>') !!}
{!! Form::submit('Submit', ['class' => 'button']) !!}

{!! Html::script('/js/vendor/jquery.js') !!}
{!! Html::script('js/photos/display_photos.js') !!}