<div class="container">
	<div class="row">
		<div class="col-xs-12">

			@foreach ($playlists as $playlist)
			<h2>{{ $playlist->title }}</h2>
			
			@foreach ($playlist->videos as $video)
			@if($video->public > 0)
			<div class="col-md-4 col-lg-3"><a class="{{($browser['isMobile'] ?: 'fancybox')}} thumbnail overlay-icon" title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th unveil" src="/img/video-fallback.png" data-src="/douglas/videos/{{ urlencode('http://i.ytimg.com/vi/' . $video->url . '/hqdefault.jpg') }}"><i class="fa fa-play-circle"></i></a><p class="video-title">{{ $video->title }}</p></div>
			@endif
			@endforeach

			@endforeach
		</div>
	</div>
</div>