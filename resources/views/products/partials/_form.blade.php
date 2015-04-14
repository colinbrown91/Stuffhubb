{!! Form::label('name', 'List Title') !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! Form::submit('Submit', ['class' => 'button']) !!}