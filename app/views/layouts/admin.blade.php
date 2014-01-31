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
              <li><a href="/admin/posts">News</a></li>
              <li><a href="/admin/pages">Pages</a></li>
              <li><a href="/admin/albums">Photos</a></li>

              <li class="has-dropdown not-click">
                <a href="/admin/videos" class="dropdown-toggle" data-toggle="dropdown">
                  Videos <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/playlists">Playlists</a></li>
                </ul>
              </li>
              <li class="has-dropdown not-click">
                <a href="/admin/downloads" class="dropdown-toggle" data-toggle="dropdown">
                  Downloads <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/wallpapers">Wallpapers</a></li>
                </ul>
              </li>
              <li class="has-dropdown not-click">
                <a href="/admin/questions" class="dropdown-toggle" data-toggle="dropdown">
                  FAQ <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/question-categories">Categories</a></li>
                </ul>
              </li>

              @if(Auth::user()->group_id <= 5)
              <li class="has-dropdown not-click">
                <a href="/admin/users" class="dropdown-toggle" data-toggle="dropdown">
                  Users <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/admin/groups">Groups</a></li>
                </ul>
              </li>
              @endif
            </ul>

            <ul class="right">
              
              <li class="has-dropdown not-click">
                <a href="/admin" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i> {{ Auth::user()->first_name }} <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
              
            </ul>
            @endif
          </section>
        </nav>
      </div>
    </header>

    @include('partials.error-messages')

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
