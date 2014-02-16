    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="/">Eastercamp '14</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

            <li class="{{ (Request::segment(1) == '') ? 'active' : '' }} hidden-xs hidden-sm"><a href="/"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="{{ (Request::segment(1) == 'news') ? 'active' : '' }}"><a href="/news"><!-- <i class="visible-xs fa fa-bullhorn fa-lg"></i> -->News</a></li>
            <li class="{{ (Request::segment(1) == 'register') ? 'active' : '' }}"><a href="/register"><!-- <i class="visible-xs fa fa-pencil fa-lg"></i> -->Register</a></li>
            <li class="{{ (Request::segment(1) == 'information') ? 'active' : '' }} dropdown">
              <a href="/information" class="dropdown-toggle" data-toggle="dropdown"><!-- <i  class="visible-xs fa fa-info-circle fa-lg"></i> -->Information <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/information">Eastercamp</a></li>
                <li><a href="/information/parents-caregivers">Parents &amp; Caregivers</a></li>
                <li><a href="/information/volunteer">Volunteer to Help</a></li>
                <li><a href="/information/the-rules">The Rules</a></li>
                <li><a href="/information/gear-list">Gear List</a></li>
              </ul>
            </li>
            <li class="{{ (Request::segment(1) == 'faq') ? 'active' : '' }} dropdown">
              <a href="/faq" class="dropdown-toggle" data-toggle="dropdown"><!-- <i class="visible-xs fa fa-question-circle fa-lg"></i> -->FAQ <b class="caret"></b></a>
              <ul class="dropdown-menu">
              @foreach($global_categories as $question)
                <li><a href="/faq/{{ $question->slug }}">{{ $question->title }}</a></li>
              @endforeach
              </ul>
            </li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">

            <li class="{{ (Request::segment(1) == 'downloads') ? 'active' : '' }}"><a href="/downloads" title="Downloads"><span class="hidden-xs"><i class="fa fa-cloud-download fa-lg"></i></span><span class="visible-xs">Downloads</span></a></li>
            <li class="{{ (Request::segment(1) == 'photos') ? 'active' : '' }}"><a href="/photos" title="Photos"><span class="hidden-xs"><i class="fa fa-camera fa-lg"></i></span><span class="visible-xs">Photos</span></a></li>
            <li class="{{ (Request::segment(1) == 'videos') ? 'active' : '' }}"><a href="/videos" title="Videos"><span class="hidden-xs"><i class="fa fa-youtube-play fa-lg"></i></span><span class="visible-xs">Videos</span></a></li>
            <li class="{{ (Request::segment(1) == 'contact') ? 'active' : '' }}"><a href="/contact" title="Contact"><span class="hidden-xs"><i class="fa fa-phone fa-lg"></i></span><span class="visible-xs">Contact</span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>