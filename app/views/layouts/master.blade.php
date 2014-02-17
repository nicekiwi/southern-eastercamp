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
    <title>{{ $metaTitle }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="handheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="copyright" content="copyright 2014 cys.org.nz" /> 
    <meta name="keywords" content="" />
    <meta name="description" content="{{ $metaDesc }}" />
    <meta name="robots" content="all" /> 

    <meta itemprop="name" content="{{ $metaTitle }}">
    <meta itemprop="description" content="{{ $metaDesc }}">
    <meta itemprop="image" content="http://www.eastercamp.org.nz/images/facebook.png">

    <meta property="og:title" content="{{ $metaTitle }}" />
    <meta property="og:description" content="{{ $metaDesc }}" />

    <meta property="og:image" content="http://www.eastercamp.org.nz/images/facebook.png" />
    <meta property="og:type" content="non_profit" />
    <meta property="og:url" content="http://www.eastercamp.org.nz" />
    <meta property="og:site_name" content="" />
    <meta property="fb:admins" content="1082075795"/>

    <link rel="publisher" href="https://plus.google.com/109194678174277060406" />
    <link rel="shortcut icon" href="/fav-icon.png" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">

    <link href="/build/css/app.min.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.1.1/js/vendor/modernizr.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      @include('partials.header-nav')

      @include('partials.error-messages')

      <!--[if lt IE 7]>
      <div class="row">
        <div class="small-12 columns">
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        </div>
      </div><![endif]-->

      {{ $content }}

      <div class="push"></div>
    </div>

    @include('partials.footer-supporters')

    <footer>

      <div class="row">
        <div class="small-12 medium-4 columns copyright">
        <p style="margin:0;">&copy; 2014 CYS</p>
        </div>
        <div class="small-12 medium-8 columns show-for-medium-up">
          <ul class="inline-list right">
            <li><a href="/information/parents-caregivers">Parents</a></li>
            <li><a target="_blank" href="https://www.eastercamp.org.nz/southern/leaders">Leaders</a></li>
            <li><a href="/information/volunteer">Volunteer</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.1.1/js/vendor/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.1.1/js/foundation.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>
    <script src="/build/js/jquery.livesearch.min.js"></script>

    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/js/directions.min.js"></script> -->

    <script src="/build/js/app.min.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-27731360-1', 'eastercamp.org.nz');
        ga('send', 'pageview');

    </script>
  </body>
</html>