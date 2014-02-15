<div class="row content-top">
	<div class="small-12 columns">

		@foreach ($playlists as $playlist)
		<h2>{{ $playlist->title }}</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
			@foreach ($playlist->videos as $video)
			@if($video->public > 0)
			<li><a class="{{($browser['isMobile'] ?: 'fancybox')}} overlay-icon" title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th unveil" src="/img/video-fallback.png" data-src="/douglas/videos/http://i.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg"><i class="fa fa-play-circle"></i></a><p class="video-title">{{ $video->title }}</p></li>
			@endif
			@endforeach
		</ul>
		@endforeach
	</div>
</div>