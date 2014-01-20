<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    @if(getenv('LARA_ENV') !== 'production')
    <meta name="robots" content="noindex, nofollow">
    @endif
    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="/bower_components/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/bower_components/components-font-awesome/css/font-awesome.min.css">

    <link href="/css/app.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <script src="/bower_components/modernizr/modernizr.js"></script>
    <style>
    .news-post img.lazy {
        width: 100%;
    }
    </style>
  </head>
  <body>

    <div class="row">
      
    </div>

    <div class="row">
      <div class="small-12 columns">
        <!--[if lt IE 7]>
          <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
      </div>
    </div>

    <header class="nav-header">
      <div class="row">
        <nav class="top-bar" data-topbar>
          <ul class="title-area">
            <li class="name show-for-small-only">
              <h1><a href="/"><img src="/img/ec-logo-header.svg"></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <section class="top-bar-section">
            <ul>
              <li class="hide-for-small-only"><a href="/"><i class="fa fa-home fa-lg"></i></a></li>
              <li><a href="/news"><span><i class="show-for-small-only fa fa-globe fa-lg"></i><span>News</span></span></a></li>
              <li><a href="/register"><span><i class="show-for-small-only fa fa-pencil fa-lg"></i><span>Register</span></span></a></li>
              <li class="has-dropdown">
                <a href="/information"><span><i class="show-for-small-only fa fa-info-circle fa-lg"></i><span>Information</span></span></a>
                <ul class="dropdown">
                  <li><a href="/information">Eastercamp</a></li>
                  <li><a href="/information/parents-caregivers">Parents &amp; Caregivers</a></li>
                  <li><a href="/information/volunteer">Volunteer to Help</a></li>
                  <li><a href="/information/the-rules">The Rules</a></li>
                  <li><a href="/information/gear-list">Gear List</a></li>
                </ul>
              </li>
              <li class="has-dropdown">
                <a href="/faq"><span><i class="show-for-small-only fa fa-question-circle fa-lg"></i><span>FAQ</span></span></a>
                <ul class="dropdown">
                  <li><a href="/faq/general">General</a></li>
                  <li><a href="/faq/registration">Registration</a></li>
                  <li><a href="/faq/transport">Transport</a></li>
                </ul>
              </li>
            </ul>

            <ul class="right">
              <li><a href="/downloads"><span><i class="fa fa-cloud-download fa-lg"></i><span class="show-for-small-only">Downloads</span></span></a></li>
              <li><a href="/photos"><span><i class="fa fa-camera fa-lg"></i><span class="show-for-small-only">Photos</span></span></a></li>
              <li><a href="/videos"><span><i class="fa fa-youtube-play fa-lg"></i><span class="show-for-small-only">Videos</span></span></a></li>
              <li><a href="/contact"><span><i class="fa fa-phone fa-lg"></i><span class="show-for-small-only">Contact</span></span></a></li>
            </ul>
          </section>
        </nav>
      </div>
    </header>

    @yield('content')

    <div class="row">
      <div class="small-12 medium-4 columns">
        @include('partials.footer-video')
      </div>

      <div class="small-12 medium-8 columns">
        @include('partials.footer-photos')
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3>Proudly Supported by</h3>
        <ul class="example-orbit" data-orbit>
          <li>
            <img style="float:left;" src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img style="float:left;" src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img style="float:left;" src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img style="float:left;" src="/img/supporters/nz-police.jpg" alt="slide 1" />
          </li>
          <li>
            <img src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img src="/img/supporters/nz-police.jpg" alt="slide 1" />
            <img src="/img/supporters/nz-police.jpg" alt="slide 1" />
          </li>
        </ul>
      </div>
    </div>

    <footer>
      <div class="row">
        <div class="small-12 columns">
          
        </div>
        <div class="small-12 columns">
          <p>&copy; CYS - Designed &amp; Developed by Kiwidev</p>
        </div>
      </div>
    </footer>

    <script src="/bower_components/jquery/jquery.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/fancybox/source/jquery.fancybox.js"></script>
    <script src="/bower_components/fancybox/source/helpers/jquery.fancybox-media.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>

    <script src="/js/masonry.pkgd.min.js"></script>

    <script src="/js/app.js"></script>
  </body>
</html>
