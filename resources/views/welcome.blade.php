@extends('layouts.main')
<center>
@section('content')
<div class="large-4 large-centered columns">
  <p></p>
  <a href="#" class="button expand" >Log in with Facebook</a>
  <a href="#" class="button alert expand" >Log in with Google</a>
</div>

<form>
  <div class="row">
    <div class="large-4 large-centered columns">
      <p>_______________________________________</p>
      	<p></p>
	    <input type="text" placeholder="Username" />
	    <input type="text" placeholder="Password" />
     	<a href="#" class="button success expand">Log in</a>
     	<a href="#">Forgot your password?</a>
     	<p>Don't have an accout? <a href="{{ url('/auth/register') }}">Sign up!</a></p>
     	<p>_______________________________________</p>
     	<p>If you click .............. ...................... .................. ............... .................. ...................</p>
     </div>
  </div>


</form>
</center>
@endsection