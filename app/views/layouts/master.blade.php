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
    <meta name="description" content="{{ $metaDesc }}">
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
            <li class="name show-for-small-only">
              <h1><a href="/">Eastercamp '14</a></h1>
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
                @foreach($questions as $question)
                  <li><a href="/faq/{{ $question->slug }}">{{ $question->title }}</a></li>
                @endforeach
                </ul>
              </li>
            </ul>

            <ul class="right">
              <li><a href="/downloads"><span><i class="fa fa-cloud-download fa-lg"></i><span class="show-for-small-only">Downloads</span></span></a></li>
              <li class="has-dropdown">
                <a href="/photos"><span><i class="fa fa-camera fa-lg"></i><span class="show-for-small-only">Photos</span></span></a>
                <ul class="dropdown">
                  <li><a href="/photos/2013">2013</a></li>
                  <li><a href="/photos/2012">2012</a></li>
                  <li><a href="/photos/2011">2011</a></li>
                  <li><a href="/photos/2010">2010</a></li>
                </ul>
              </li>
              <li><a href="/videos"><span><i class="fa fa-youtube-play fa-lg"></i><span class="show-for-small-only">Videos</span></span></a></li>
              <li><a href="/contact"><span><i class="fa fa-phone fa-lg"></i><span class="show-for-small-only">Contact</span></span></a></li>
            </ul>
          </section>
        </nav>
      </div>
    </header>

    @include('partials.error-messages')

    <!--[if lt IE 7]>
    <div class="row">
      <div class="small-12 columns">
          <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      </div>
    </div><![endif]-->

    {{ $content }}

    <div class="row">
      <div class="small-12 columns">
        @include('partials.footer-supporters')        
      </div>
    </div>

    <!-- <section class="footer-first">
      <div class="row">
        @include('partials.footer-media')
      </div>
    </section> -->

    <footer>
      <div class="row">
        <div class="small-4 columns">
        <p>meow</p>
        </div>
        <div class="small-8 columns">
          <ul class="inline-list right">
            <li><a href="/information/parents-caregivers">Parents</a></li>
            <li><a href="https://www.eastercamp.org.nz/southern/leaders">Leaders</a></li>
            <li><a href="/information/volunteer">Volunteer</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/privacy">Privacy</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
          <p>&copy; 2012 CYS. All Rights Reserved. Designed &amp; Developed by Ezra Sharp</p>
        </div>
      </div>
    </footer>

    <script src="/bower_components/jquery/jquery.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/fancybox/source/jquery.fancybox.js"></script>
    <script src="/bower_components/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="/bower_components/unveil/jquery.unveil.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

    <script src="/js/jcarousellite.min.js"></script>

    <script src="/js/app.js"></script>
  </body>
</html>
