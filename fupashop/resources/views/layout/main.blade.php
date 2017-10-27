<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            FUPA HOME
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{ asset('dist/css/foundation.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
      <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">

    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/anchorlink.js"></script>
        <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       FUPA TECHNOLOGY
                    </a>
                </h4>
                </div>
             <div class="top-bar-left">
                <ol class="menu">
                      <li class="{{ Request::is( 'monitors') ? 'active' : '' }}">
                        <a href="{{ URL::to( 'monitors') }}">
                            MONITORS
                        </a>
                    </li>
                      <li class="{{ Request::is( 'desktops') ? 'active' : '' }}">
                        <a href="{{ URL::to( 'desktops') }}">
                            DESKTOPS
                        </a>
                    </li>
                      <li class="{{ Request::is( 'laptops') ? 'active' : '' }}">
                        <a href="{{ URL::to( 'laptops') }}">
                            LAPTOPS
                        </a>
                    </li>
                      <li class="{{ Request::is( 'tablets') ? 'active' : '' }}">
                        <a href="{{ URL::to( 'tablets') }}">
                            TABLETS
                        </a>
                    </li>
                    <li>
                      <a href="/admin">
                          Admin Panel
                      </a>
                  </li>
                </ol>
            </div>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                     <li class="dropdown">
                                <a href="{{ route('myAccount') }}" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstName }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                    <li>
                        <a href="{{ URL('/cart') }}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART
                            <span class="alert badge">
                                8
                            </span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>

@yield('content')
        <!-- Footer -->
        <br>
<footer class="footer">
  <div class="row full-width">
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-laptop"></i>
      <p>Coded with love for Dr. Constantinides</p>
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-html5"></i>
      <p>Powered by HTML5</p>
    </div>

    <div class="small-6 medium-4 large-4 columns">
      <h4>Follow Us on Twitch</h4>
      <ul class="footer-links">
        <li><a href="https://twitch.tv/oystersdota">Nick</a></li>
        <li><a href="https://twitch.tv/grao__">Gurk</a></li>
        <li><a href="https://twitch.tv/trembie">Shake</a></li>
      <ul>
    </div>
  </div>
</footer>

    <script src="{{ asset('dist/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
  <!--<script src="{{ asset('js/app.js') }}"></script> -->

    </body>
</html>
