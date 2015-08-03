@extends('layouts.main')

@section('title')

  Home

@stop

@section('content')

	<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Welcome, {!!  Auth::user()->name !!}</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Coming soon.</h1>
            <p class="lead">Metzelhoff.com hosts a collection of projects I'm working on that I'd like to share with you. Stay tuned for updates.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Projects and designs by <a href="https://twitter.com/metzelhoff">@metzelhoff</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

@stop