<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Stuffhubb</title>
        <link rel="stylesheet" href="{!! asset('css/foundation.css') !!}" />
        <script src="{!! asset('js/vendor/modernizr.js') !!}"></script>
    </head>

<body>
    
    <!-- Header and Nav -->
    {{-- check if user is authenticated --}}
    @if (Auth::check())
        <nav class="top-bar" data-topbar role="navigation">
          <ul class="title-area">
            <li class="name" >
              <h1><a href="{{ url('/') }}">StuffHubb</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a href="{{ url('/about') }}">ABOUT</a></li>
                <li><a href="{{ url('/profile') }}">PROFILE</a></li>
                <li><a href="{{ url('/products') }}">PRODUCTS</a></li>
                {{-- clicking log out will log out user --}}
                <li> <a href="{{url('/auth/login')}}">  LOG OUT </a></li> 
                <li><a href="{{ url('/auth/register') }}">SIGN UP</a></li>
                <li><a href="{{ url('/auth/login') }}">LOG IN</a></li>
                <li class="active"><a href="{{ url('#') }}">LIST</a></li> --}}
            </ul>
            <!-- Left Nav Section -->
            <ul class="left">
              <li><a href="#">Left Nav Button</a></li>
            </ul>
          </section> 
        </nav>
    @else 
        <nav class="top-bar" data-topbar role="navigation">
            <div class="row" class="name">
              <div class="small-1 small-centered columns">
                  <ul class="title-area">
                    <li class="name">
                      <h1><font color="white">StuffHubb</font></h1>
                    </li>
                  </ul>
              </div>
            </div>
        </nav>
    @endif

    <!-- End Header and Nav -->

    @if (Session::has('message'))
        <div class="alert-box success">
            {{{ Session::get('message') }}}
        </div>
    @endif

    <div class="row">
        <div class="large-12">
            @yield('content')
        </div>
    </div>


 
    <footer class="row">
        <div class="large-12 columns">
            <hr />
            <div class="row">
                <div class="large-12 columns">
                    <p><center>©StuffHubb</center></p>
                </div>
            </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="{!! asset('/js/vendor/jquery.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/foundation.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/app.js') !!}"></script>
    <script> $(document).foundation(); </script>

    </body>
</html>