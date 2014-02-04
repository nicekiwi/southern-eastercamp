<div class="small-12 medium-6 columns">
	@if(@is_null($video))
	<a class="fancybox" data-title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th" src="http://i.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg"></a>
	@endif
</div>

<div class="small-12 medium-6 columns">
	<ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-4">

		@foreach($photos as $photo)
			<li><a href="{{ $photo->picture }}" rel="photo-gallery" class="fancybox"><img class="th gallery-photo" src="/img/gallery-fallback.png" data-src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&url={{ $photo->picture }}&height=200&width=300"></a></li>
		@endforeach

	</ul>
</div>