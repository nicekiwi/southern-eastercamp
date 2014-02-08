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
          <li class="{{ (Request::segment(1) == '') ? 'active' : '' }} hide-for-small-only"><a href="/"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="{{ (Request::segment(1) == 'news') ? 'active' : '' }}"><a href="/news"><span><i class="show-for-small-only fa fa-bullhorn fa-lg"></i><span>News</span></span></a></li>
          <li class="{{ (Request::segment(1) == 'register') ? 'active' : '' }}"><a href="/register"><span><i class="show-for-small-only fa fa-pencil fa-lg"></i><span>Register</span></span></a></li>
          <li class="{{ (Request::segment(1) == 'information') ? 'active' : '' }} has-dropdown">
            <a href="/information"><span><i class="show-for-small-only fa fa-info-circle fa-lg"></i><span>Information</span></span></a>
            <ul class="dropdown">
              <li><a href="/information">When, Where and Who</a></li>
              <li><a href="/information/parents-caregivers">Parents &amp; Caregivers</a></li>
              <li><a href="/information/volunteer">Volunteer to Help</a></li>
              <li><a href="/information/the-rules">The Rules</a></li>
              <li><a href="/information/gear-list">Gear List</a></li>
            </ul>
          </li>
          <li class="{{ (Request::segment(1) == 'faq') ? 'active' : '' }} has-dropdown">
            <a href="/faq"><span><i class="show-for-small-only fa fa-question-circle fa-lg"></i><span>FAQ</span></span></a>
            <ul class="dropdown">
            @foreach($questions as $question)
              <li><a href="/faq/{{ $question->slug }}">{{ $question->title }}</a></li>
            @endforeach
            </ul>
          </li>
        </ul>

        <ul class="right">
          <li class="{{ (Request::segment(1) == 'downloads') ? 'active' : '' }}"><a href="/downloads" title="Downloads"><span><i class="fa fa-cloud-download fa-lg"></i><span class="show-for-small-only">Downloads</span></span></a></li>
          <li class="{{ (Request::segment(1) == 'photos') ? 'active' : '' }}"><a href="/photos" title="Photos"><span><i class="fa fa-camera fa-lg"></i><span class="show-for-small-only">Photos</span></span></a></li>
          <!-- <li class="has-dropdown">
            <a href="/photos"><span><i class="fa fa-camera fa-lg"></i><span class="show-for-small-only">Photos</span></span></a>
            <ul class="dropdown">
              <li><a href="/photos/2013">2013</a></li>
              <li><a href="/photos/2012">2012</a></li>
              <li><a href="/photos/2011">2011</a></li>
              <li><a href="/photos/2010">2010</a></li>
            </ul>
          </li> -->
          <li class="{{ (Request::segment(1) == 'videos') ? 'active' : '' }}"><a href="/videos" title="Videos"><span><i class="fa fa-youtube-play fa-lg"></i><span class="show-for-small-only">Videos</span></span></a></li>
          <li class="{{ (Request::segment(1) == 'contact') ? 'active' : '' }}"><a href="/contact" title="Contact"><span><i class="fa fa-phone fa-lg"></i><span class="show-for-small-only">Contact</span></span></a></li>
        </ul>
      </section>
    </nav>
  </div>
</header>