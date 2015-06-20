{!! Form::file('file_0', null, ['class' => 'form-control']) !!}
{!! $errors->first('file_0', '<small class="error">:message</small>') !!}
{!! Form::submit('Submit', ['class' => 'button']) !!}