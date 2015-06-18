@extends('layouts.main')

@section('content')
<center>
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
    {{-- <a href="#" class="button alert expand" >Log in with Google</a> --}}
    <p>_______________________________________</p>
	<form role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	      <p>Sign up with your email address</p>
	      	<p></p>
		    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
		    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/>
		    <input type="password" placeholder="Password" name="password"/>
		    <input type="password" placeholder="Confirm Password" name="password_confirmation"/>

	      <p> Date of Birth <p>
	        <input type="text" placeholder="Month" name="month" />
	  		<input type="text" placeholder="Day" name="day" />
	  		<input type="text" placeholder="Year" name="year" />

	      <input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
	      <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
	      	      
		  <button type="submit" class="button success expand">Sign Up</button>
			
  </div>











</form>
</center>

@endsection
