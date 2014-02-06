<div class="row">
	<div class="small-12 columns">

		@foreach ($playlists as $playlist)
		<h2>{{ $playlist->title }}</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
			@foreach ($playlist->videos as $video)
			@if($video->public > 0)
			<li><a class="fancybox" title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th" src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&url=http://i.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg&height=170&width=300"><i class="fa fa-play-circle"></i></a><p class="video-title">{{ $video->title }}</p></li>
			@endif
			@endforeach
		</ul>
		@endforeach
	</div>
</div>