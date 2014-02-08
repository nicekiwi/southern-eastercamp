<div class="row content-top">
	<div class="small-12 columns">

		<h2 class="center">Eastercamp {{ $album->year }} Photos</h2>

		{{ $photos->links() }}
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
		@foreach ($photos as $photo)
			<li><a href="{{ $photo->picture }}" rel="photo-gallery" class="fancybox overlay-icon"><img class="th unveil" src="/img/gallery-fallback.png" data-src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&url={{ $photo->picture }}&height=200&width=300"></a></li>
		@endforeach
		</ul>

		{{ $photos->links() }}
	</div>
</div>