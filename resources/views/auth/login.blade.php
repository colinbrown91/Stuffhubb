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
	              <button type="button" class="btn btn-primary btn-block">Sign in with Facebook</button>
	            </div>
	          </div>
	          <br>
	          <div class="row">
	            <div class="col-xs-offset-2 col-xs-8">
	              <button type="button" class="btn btn-danger btn-block">Sign in with Google</button>
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

					<hr>


          			<h5 class="text-center">Sign in with your email address</h5>

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">


			            <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="email" class="form-control" name="email" placeholder="Email">
			              </div>
			            </div>


				        <div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <input type="password" class="form-control" name="password" placeholder="Password">
			              </div>
			            </div>					

						<div class="form-group">
							<div class="col-xs-offset-2 col-xs-8">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>


						<div class="form-group">
			              <div class="col-xs-offset-2 col-xs-8">
			                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
			              </div>
			            </div>

			        </form>

			        <a href="#" class="text-center"><h6>Forgot your password?</h6></a>

						
					<hr>


          			<h5 class="text-center">Don't have an account?</h5>
          			<a href="/auth/register" class="text-center"><h5>Sign up!</h5></a>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection


