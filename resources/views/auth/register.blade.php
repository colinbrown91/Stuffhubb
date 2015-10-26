@extends('layouts.main')

@section('content')

<div class="container">


  <br>


    <div class="row">
      <div class="col-xs-offset-3 col-xs-6">
        <div class="well">
          <h1 class="text-center">Stuffhubb</h1>


          <br>
          <br>


          <div class="row">
            <div class="col-xs-offset-2 col-xs-8">
              <button type="button" class="btn btn-primary btn-block">Sign up with Facebook</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-offset-2 col-xs-8">
              <button type="button" class="btn btn-danger btn-block">Sign up with Google</button>
            </div>
          </div>


          <hr>


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

			<form role="form" method="POST" action="{{ url('/auth/register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

          		<h5 class="text-center">Sign up with your email address</h5>
          			<form class="form-horizontal">
			            <br>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="text" class="form-control" name="name" placeholder="Name">
			              </div>
			            </div>
			            <br>
			            <br>
			            <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="email" class="form-control" name="email" placeholder="Email">
			              </div>
			            </div>
			            <br>
			            <br>
			          	<div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="password" class="form-control" name="password" placeholder="Password">
			              </div>
			            </div>
			            <br>
			            <br>
			            <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
			              </div>
			            </div>
			            <br>
			            <br>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="text" class="form-control" name="month" placeholder="Month">
			              </div>
			            </div>
			            <br>
			            <br>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="text" class="form-control" name="day" placeholder="Day">
			              </div>
			            </div>
			            <br>
			            <br>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="text" class="form-control" name="year" placeholder="Year">
			              </div>
			            </div>			            
			            <br>
			            <br>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="radio" name="gender" value="male" id="male"> <label for="male">Male</label>
			              </div>
			            </div>
					    <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
			              </div>
			            </div>			
			            <br>
            			<div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
			              </div>
			            </div>            			            

			            <br>
			            <br>

			        </form>


			</form>


					
		  </div>
		</div>
	</div>
</div>


		  

@endsection
