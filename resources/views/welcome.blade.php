@extends('layouts.main')
<center>
@section('content')
<div class="large-4 large-centered columns">
  <div class="row"> 

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

<p></p>
<a href="#" class="button expand" >Log in with Facebook</a>
<form role="form" method="POST" action="{{ url('/') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <p>_______________________________________</p>
      	<p></p>
      <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="checkbox" name="remember"> Remember Me
     	<a href="/" class="button success expand">Log in</a>
     	<a href="#">Forgot your password?</a>
     	<p>Don't have an accout? <a href="{{ url('/auth/register') }}">Sign up!</a></p>
     	<p>_______________________________________</p>
     	<p>If you click .............. ...................... .................. ............... .................. ...................</p>


</form>
</div>
</center>
@endsection