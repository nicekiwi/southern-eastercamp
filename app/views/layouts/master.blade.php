<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="viewport" content="width=device-width">
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/css/foundation.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/nivo-lightbox.css">
    <link rel="stylesheet" href="/themes/default/default.css">
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

    <div class="row">
      <div class="small-12 medium-4 columns">
      <img src="/img/ec-nav-logo.svg">
      </div>
      <div class="small-12 medium-8 columns">
        <nav class="top-bar" data-topbar>
          <ul class="title-area">
            <li class="name">
              <h1><a href="#">Eastercamp '14</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
              <li class="has-dropdown">
                <a href="#">FAQ</a>
                <ul class="dropdown">
                  <li><a href="/faq/general">General</a></li>
                  <li><a href="/faq/registration">Registration</a></li>
                  <li><a href="/faq/parents">Parents</a></li>
                  <li><a href="/faq/transport">Transport</a></li>
                  <li><a href="/faq/leaders">Leaders</a></li>
                </ul>
                <li><a href="/media">Media</a></li>
                <li><a href="/contact">Contact</a></li>
              </li>
            </ul>

            <!-- Left Nav Section -->
            <ul class="left">
              <li><a href="/news">News</a></li>
              <li><a href="/registration">Registration</a></li>
              <li><a href="/information">Information</a></li>
            </ul>
          </section>
        </nav>
      </div>
    </div>

    <div class="row">
      @yield('content')
    </div> <!-- #main-container -->

    <div class="row">
      <footer class="small-12 columns">
        <p>&copy; CYS - Designed &amp; Developed by Kiwidev</p>
      </footer>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/foundation.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>
    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/nivo-lightbox.js"></script>
    <script>
      $(document).foundation();
      $(document).ready(function() {
        $('a.lightbox').nivoLightbox();
      });

      $('#ec-countdown').countdown({ 
        until: new Date("April 17, 2014 20:00:00"),
        compactLabels: ['y', 'm', 'w', 'Days'],
        compact: true
      }); 

      $('#news-posts').masonry({
        itemSelector: '.news-post',
        transitionDuration: 0
      });

      // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      // ga('create', 'UA-27731360-1', 'eastercamp.org.nz');
      // ga('send', 'pageview');

    </script>
  </body>
</html>
