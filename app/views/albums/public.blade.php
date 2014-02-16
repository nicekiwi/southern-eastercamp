<div class="container">
	<div class="row">
		<div class="col-xs-12">

			<h2 class="center">Eastercamp {{ $album->year }} Photos</h2>

			<p>{{ $photos->links() }}</p>
			
			@foreach ($photos as $photo)
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2"><a href="{{ $photo->picture }}" rel="photo-gallery" class="{{($browser['isMobile'] ?: 'fancybox')}} thumbnail overlay-icon"><img class="th unveil" src="/img/gallery-fallback.png" data-src="/douglas/photos/{{ urlencode($photo->picture) }}"></a></div>
			@endforeach

			<p>{{ $photos->links() }}</p>
		</div>
	</div>
</div>
