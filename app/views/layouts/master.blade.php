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
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/css/foundation.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/nivo-lightbox.css">
    <link rel="stylesheet" href="/themes/default/default.css">
    <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/main.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/modernizr.min.js"></script>
    <style>
    .news-post img.lazy {
        width: 100%;
    }
    </style>

    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/modernizr.min.js"></script>
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
        <!-- <div class="small-12 medium-3 large-2 columns">
          <a href="/"><img src="/img/ec-logo-header.svg"></a>
        </div>

        <nav class="ec-nav small-12 medium-9 large-10 columns">
          <ul style="float:left;">
            <li><a href="/news">News</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/information">Information</a></li>
            <li><a href="/faq">FAQ</i></a></li>
          </ul>

          <ul>
            <li><a href="/downloads"><i class="fa fa-cloud-download"></i></a></li>
            <li><a href="/photos"><i class="fa fa-camera"></i></a></li>
            <li><a href="/videos"><i class="fa fa-youtube-play"></i></a></li>
            <li><a href="/contact"><i class="fa fa-phone"></i></a></li>
          </ul>
        </nav> -->

        <div class="small-12 columns">
          <nav class="top-bar" data-topbar>
            <ul class="title-area">
              <li class="name">
                <h1><a href="/"><img src="/img/ec-logo-header.svg"></a></h1>
              </li>
              <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
              <ul>
                <li><a href="/news"><span><i class="show-for-small-only fa fa-globe"></i><span>News</span></span></a></li>
                <li><a href="/register"><span><i class="show-for-small-only fa fa-pencil"></i><span>Register</span></span></a></li>
                <li class="has-dropdown">
                  <a href="/information"><span><i class="show-for-small-only fa fa-info-circle"></i><span>Information</span></span></a>
                  <ul class="dropdown">
                    <li><a href="/information#eastercamp">Eastercamp</a></li>
                    <li><a href="/information/registration">Registration</a></li>
                    <li><a href="/information/parents">The Rules</a></li>
                    <li><a href="/information/transport">Gear List</a></li>
                    <li><a href="/information/leaders">Volunteer</a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a href="/help"><span><i class="show-for-small-only fa fa-question-circle"></i><span>Help</span></span></a>
                  <ul class="dropdown">
                    <li><a href="/faq/general">Frequently Asked Questions</a></li>
                    <li><a href="/faq/registration">Registration</a></li>
                    <li><a href="/faq/parents">Safety &amp; Security</a></li>
                    <li><a href="/faq/transport">Partents Information</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                  </ul>
                </li>
              </ul>

              <ul class="right">
                <li><a href="/downloads"><span><i class="fa fa-cloud-download"></i><span class="show-for-small-only">Downloads</span></span></a></li>
                <li><a href="/photos"><span><i class="fa fa-camera"></i><span class="show-for-small-only">Photos</span></span></a></li>
                <li><a href="/videos"><span><i class="fa fa-youtube-play"></i><span class="show-for-small-only">Videos</span></span></a></li>
                <li><a href="/contact"><span><i class="fa fa-phone"></i><span class="show-for-small-only">Contact</span></span></a></li>
              </ul>
            </section>
          </nav>
        </div>
      </div>

    </header>

    @yield('content')

    <div class="row">
      <footer class="small-12 columns">
        <p>&copy; CYS - Designed &amp; Developed by Kiwidev</p>
      </footer>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/foundation.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    <script src="/js/jquery.appear.js"></script>

    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/nivo-lightbox.js"></script>
    <script src="/js/main.js"></script>
    <script></script>
  </body>
</html>
