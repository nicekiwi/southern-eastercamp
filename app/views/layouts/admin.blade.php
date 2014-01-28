<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="/bower_components/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/bower_components/components-font-awesome/css/font-awesome.min.css">

    <link href="/css/app.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <script src="/bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
    <header class="nav-header">
      <div class="row">
        <nav class="top-bar" data-topbar>
          <ul class="title-area">
            <li class="name">
              <h1><a href="/admin">EC Admin</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>
          
          <section class="top-bar-section">
          @if(Auth::check())
            <ul>
              <li><a href="/admin/albums"><i class="fa fa-camera"></i>&nbsp;&nbsp;Photos</a></li>

              <li class="has-dropdown not-click">
                <a href="/admin/videos" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-youtube-play"></i>&nbsp;&nbsp;Videos <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/playlists">Playlists</a></li>
                </ul>
              </li>
              <li><a href="/admin/downloads"><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;Downloads</a></li>
              <li class="has-dropdown not-click">
                <a href="/admin/questions" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-question-circle"></i>&nbsp;&nbsp;Questions</a> <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/question-categories">Categories</a></li>
                </ul>
              </li>
            </ul>

            <ul class="right">
              
              <li class="has-dropdown not-click">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i> {{ Auth::user()->username }} <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
              </li>
              
            </ul>
            @endif
          </section>
        </nav>
      </div>
    </header>

    <div class="row">
      <div class="small-12 columns">
        <!-- Display Alert messages -->
        @if(Session::get('error_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius alert">
            {{ Session::get('error_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('warning_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius warning">
            {{ Session::get('flash_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('info_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius info">
            {{ Session::get('info_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('success_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius success">
            {{ Session::get('success_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
      </div>
    </div>


    @yield('content')

    <script src="/bower_components/jquery/jquery.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/fancybox/source/jquery.fancybox.js"></script>
    <script src="/bower_components/fancybox/source/helpers/jquery.fancybox-media.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>

    <script src="/js/jcarousellite.min.js"></script>
    <script src="/js/masonry.pkgd.min.js"></script>

    <script src="/js/app.js"></script>
  </body>
</html>
