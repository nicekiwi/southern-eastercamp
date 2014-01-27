@extends('layouts.master')

@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Photo Albums</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
		@foreach ($photos as $photo)
			<li><a href="{{ $photo->source }}" rel="photo-gallery" class="fancybox"><img class="th gallery-photo" src="/img/gallery-fallback.png" data-src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&url={{ $photo->source }}&height=200&width=300"></a></li>
		@endforeach
		</ul>

		{{ $photos->links() }}
	</div>
</div>



@stop