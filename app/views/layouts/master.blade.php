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

    <link rel="stylesheet" href="/bower_components/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/bower_components/components-font-awesome/css/font-awesome.min.css">

    <link href="/css/app.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <script src="/bower_components/modernizr/modernizr.js"></script>
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
            <li><a href="https://www.eastercamp.org.nz/southern/leaders">Leaders</a></li>
            <li><a href="/information/volunteer">Volunteer</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="/bower_components/jquery/jquery.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/fancybox/source/jquery.fancybox.js"></script>
    <script src="/bower_components/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="/bower_components/unveil/jquery.unveil.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js" type="text/javascript"></script> -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>
    <!-- <script src="/js/jquery.livesearch.js"></script> -->

    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/js/directions.min.js"></script> -->

    <script src="/js/app.js"></script>
  </body>
</html>
