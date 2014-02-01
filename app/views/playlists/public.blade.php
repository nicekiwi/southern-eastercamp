<div class="row">
	<div class="small-12 columns">

		@foreach ($playlists as $playlist)
		<h2>{{ $playlist->title }}</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
			@foreach ($playlist->videos as $video)
			<li><a class="fancybox" data-title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th" src="http://i.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg"></a></li>
			@endforeach
		</ul>
		@endforeach
	</div>
</div>