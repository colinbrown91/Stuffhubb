@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Welcome, {!!  $user = Auth::user()->name !!}
					{!! Auth::user()->email !!}
					{{-- You are logged in {!!$user->name!!}! --}}
				</div>

				
			</div>
			<div class="row">
				<div class="small-2 columns">
					<ul class="side-nav">
						<li><a href="#">Section 1</a></li>
						<li><a href="#">Section 2</a></li>
						<li><a href="#">Section 3</a></li>
						<li><a href="#">Section 4</a></li>
						<li><a href="#">Section 5</a></li>
						<li><a href="#">Section 6</a></li>
					</ul>
				</div>
				<div class="large-10 columns">
					<form role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

					      <p>Sign up with your email address</p>
					      	<p></p>
						    <input type="text" placeholder="{!!Auth::user()->name!!}" name="name" value="{{ old('name') }}" />
						    <input type="email" placeholder="{!!Auth::user()->email!!}" name="email" value="{{ old('email') }}"/>
						    <input type="password" placeholder="Password" name="password"/>
						    <input type="password" placeholder="Confirm Password" name="password_confirmation"/>

					      <p> Date of Birth <p>
					        <input type="text" placeholder="{!!Auth::user()->month!!}" name="month" />
					  		<input type="text" placeholder="{!!Auth::user()->day!!}" name="day" />
					  		<input type="text" placeholder="{!!Auth::user()->year!!}" name="year" />

					  	@if( Auth::user()->gender === "male" )
					  		<input type="radio" name="gender" value="male" id="male" checked><label for="male">Male</label>
					      <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
					  	@elseif( Auth::user()->gender === "female" )
					  		<input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
					      <input type="radio" name="gender" value="female" id="female" checked><label for="female">Female</label>
					  	@endif
					      
					      	      
						  <button type="submit" class="button success expand">Sign Up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection