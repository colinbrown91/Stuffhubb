{{-- HTML Form --}}
{!! Form::label('file_0', 'Photo') !!} {{--id='file_0' to the file form below--}}
{!! Form::file('file_0', null, ['class' => 'form-control']) !!}
{!! $errors->first('file_0', '<small class="error">:message</small>') !!}
{!! Form::submit('Submit', ['class' => 'button']) !!}

{{-- Javascript --}}
{!! Html::script('/js/vendor/jquery.js') !!} {{-- Have to reload jquery --}}
{!! Html::script('js/photos/display_photos.js') !!}