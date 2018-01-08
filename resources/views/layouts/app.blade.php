<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <!--link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.css' type='text/css' />
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.40.0/mapbox-gl.css' rel='stylesheet' />
    -->
    <!-- fotorama.css & fotorama.js. -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <link href="{{ asset('/../css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/../css/main.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet">
    <!--link rel="stylesheet" href="{{ asset('/../public/css/iThing.css') }}" type="text/css" />-->
    <!--link rel="stylesheet" href="{{ asset('/../public/css/jquery-ui-1.8.10.custom.css') }}" type="text/css" />-->
</head>
<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<!--
-->
<script src="{{ asset('/../js/googlemap.js')}}" ></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.widget.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.mouse.min.js"></script>-->
<!--script src="{{ asset('/../public/js/jquery-ui-1.8.16.custom.min.js')}}"></script>-->
<!--script src="{{ asset('/../public/js/jQRangeSlider-min.js')}}"></script>-->
<!-- scripts -->
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <!-- Authentication Links -->
                        @guest
                            <!-- <li id="logroute"><a href="{{ route('login') }}">Login</a></li> -->
                            <!-- <li id="regroute"><a href="{{ route('register') }}">Register</a></li> -->

                            <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mylogin">Login</button></li>
                            <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myreg">Register</button></li>
                            <!-- Modal -->
                            <div class="modal fade" id="mylogin" role="dialog">
                             <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Login</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="panel-body">
                                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                          <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="myreg" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Register</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                          {{ csrf_field() }}

                                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                              <label for="name" class="col-md-4 control-label">Name</label>

                                              <div class="col-md-6">
                                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                  @if ($errors->has('name'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('name') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                              <div class="col-md-6">
                                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('email') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="col-md-4 control-label">Password</label>

                                              <div class="col-md-6">
                                                  <input id="password" type="password" class="form-control" name="password" required>

                                                  @if ($errors->has('password'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                              <div class="col-md-6">
                                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-md-6 col-md-offset-4">
                                                  <button type="submit" class="btn btn-primary">
                                                      Register
                                                  </button>
                                              </div>
                                          </div>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        @else
                        <!-- erase this, admin check -->
                        @auth('admin')
                          @if (Auth::guard('admin')->check() == true )
                            <!--h1><strong>You are an admin!</strong></h1>-->
                          @endif
                        @endauth
                        <!-- -->
                            <li><a href="{{ asset('/../properties/create') }}" >Create Free Listing</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                      <a href="{{ url('my-profile') }}">
                                        My Profile
                                      </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-inverse">
            <div class="container">
              <!--<div class="navbar-header">
                  <a class="navbar-brand" href="{{ URL::to('properties') }}">Listings</a>
              </div>-->
              <ul class="nav navbar-nav">
                <!--<li class="active"><a href="#">Home</a></li>-->
                <li><a class="navbar-brand" href="{{ URL::to('properties') }}">Listings</a></li>
                <li><a class="navbar-brand" href="{{ URL::to('about') }}">About</a></li>
                <li><a class="navbar-brand" href="{{ URL::to('resources') }}">Resources</a></li>
                <li><a class="navbar-brand" href="{{ URL::to('blogs') }}">Blogs</a></li>
              </ul>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('/../js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('/../js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/../js/main.js') }}"></script>
    @yield('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCMiNb2ZO_OOM16aU9xTwC3m0fa0Xq6NY&libraries=places&callback=initialize"
    async defer></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
    <script type="text/javascript" src="https://www.ratehub.ca/assets/js/widget-loader.js"></script>



    <!-- google api key: AIzaSyDnqGAnkOUEljrv7-gZUnvaZeikeK0wYdo -->
    <!--script src='https://api.mapbox.com/mapbox-gl-js/v0.40.0/mapbox-gl.js'></script>
    <script src='https://unpkg.com/mapbox@1.0.0-beta7/dist/mapbox-sdk.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.min.js'></script>
    <script type="text/javascript" src="{{ asset('/../public/js/mapbox.js')}}"></script>-->
    <!--
    /satellite-streets-v10
    /satellite-v9
    /outdoors-v10
    /light-v9
    /dark-v9
    /streets-v10
     -->
</body>
@yield('footer')
</html>
