@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
<<<<<<< HEAD
<<<<<<< HEAD
				<div class="panel-heading">Home Colin</div>
=======
				<div class="panel-heading">Home Matt</div>
>>>>>>> master
=======

				<div class="panel-heading">Home Colin</div>
>>>>>>> master

				<div class="panel-body">
					{{-- {!! $user = Auth::user()->name !!} --}}
					Welcome, {!!  Auth::user()->name !!}
					{{-- You are logged in {!!$user->name!!}! --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
