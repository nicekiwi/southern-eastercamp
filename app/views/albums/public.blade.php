<div class="row content-top">
	<div class="small-12 columns">

		<h2 class="center">Eastercamp {{ $album->year }} Photos</h2>

		{{ $photos->links() }}
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
		@foreach ($photos as $photo)
			<li><a href="{{ $photo->picture }}" rel="photo-gallery" class="{{($browser['isMobile'] ?: 'fancybox')}} overlay-icon"><img class="th unveil" src="/img/gallery-fallback.png" data-src="/douglas/photos/{{ $photo->picture }}"></a></li>
		@endforeach
		</ul>

		{{ $photos->links() }}
	</div>
</div>