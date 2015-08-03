<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Metzelhoff | @yield('title')</title>
		<link rel="stylesheet" href="{!! asset('css/normalize.css') !!}">
		<link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('font-awesome/css/font-awesome.min.css') !!}">
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
               <a class="navbar-brand" href="/search">Stuffhubb</a>
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
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge">14</span> Kayak Co. <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="/dashboard">List</a></li>
                        <li><a href="/dashboard">Rent</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/sign_in"><i class="fa fa-sign-out"></i> Sign Out</a></li>
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

      <script type="text/javascript" src="{!! asset('/js/vendor/jquery.js') !!}"></script>
      <script type="text/javascript" src="{!! asset('/js/app.js') !!}"></script>


		<script src="{!! asset('js/jquery.min.js') !!}"></script> 
		<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
	</body>
</html>