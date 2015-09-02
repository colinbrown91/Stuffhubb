<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Stuffhubb | @yield('title')</title>

      <link rel="stylesheet" href="/css/normalize.css">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

	</head>
	<body>

<!-- xxxxxx -->
<!-- Navbar -->
<!-- xxxxxx -->


      <nav class="navbar navbar-inverse navbar-static-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
                  @if (Auth::check()) 
                     <a class="navbar-brand" href="/search">Stuffhubb</a>
                  @else
                     <a class="navbar-brand" href="/">Stuffhubb</a>
                  @endif
               
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <form class="navbar-form navbar-left">
                  <div class="form-group">
                     <input type="text" placeholder="Search" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
               </form>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge">14
                     </span> 
                        @if (Auth::check()) 
                           {!!  Auth::user()->name !!}
                        @else
                           New User
                        @endif
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                       @if (Auth::check())
                        <li>{!! link_to_route('user.products.index', "List", [Auth::user()->id] ) !!}</li>
                        <li>{!! link_to_route('search.index', "Rent") !!}</li>
                        <li>{!! link_to_route('user.show', "Dashboard", [Auth::user()->id] ) !!}</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/auth/logout')}}"> <i class="fa fa-sign-out"></i> Sign Out</a></li>
                       @else
                        <li><a href="{{url('/auth/login')}}"> <i class="fa fa-sign-out"></i> Sign In</a></li>
                        <li><a href="{{url('/auth/register')}}"> <i class="fa fa-sign-out"></i> Sign Up</a></li>
                       @endif
                     </ul>
                  </li>
               </ul>
            </div><!--/.navbar-collapse -->
         </div> 
      </nav>


<!-- xxxxxxx -->
<!-- Content -->
<!-- xxxxxxx -->


   <div class="container">


		@yield('content')


   </div>

      <script type="text/javascript" src="/js/vendor/jquery.js"></script>
      <script type="text/javascript" src="/js/app.js"></script>
      <script src="/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>