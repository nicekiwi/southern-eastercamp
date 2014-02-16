<div class="container">
	<div class="row">
		<div class="col-xs-12">
	 
			<h1>News</h1>

			@foreach ($posts as $post)


			<p class="news-since"><strong>{{ $post->posted_at->diffForHumans() }}</strong></p>
			@if($post->message != '')
				<p>{{ $post->message }}
				@if(!strstr($post->message, 'http') && $post->link != '' && !strstr($post->link, 'facebook') && !strstr($post->type, 'video'))
					<a href="{{ $post->link }}" title="{{ $post->link_name }}" target="_blank">{{ $post->link }}</a></p>
				@endif
			@endif

			@if($post->status_type == 'added_photos' && $post->link_name != '')
				- <a href="{{ $post->link }}" target="_blank" title="{{ $post->link_name }}">{{ $post->link_name }}</a>
				@if($post->link_caption != '')
					<small> (Added {{ $post->link_caption }})</small>
				@endif
			@endif

		    <!-- Video Formatting -->
		    @if($post->type == 'video')
		    	@if($post->source != '')
		    		@if(strstr($post->source, 'youtube'))
			          <p><a class="{{($browser['isMobile'] ?: 'fancybox')}} thumbnail overlay-icon" href="//www.youtube.com/embed/{{ rawurldecode(substr($post->picture, 112,11)) }}?rel=0&amp;autoplay=1" title="{{$post->link_name}}">
			            <img class="th unveil" src="/img/video-fallback.png" data-src="/douglas/videos/{{ urlencode(rawurldecode(substr($post->picture, 79,44)) . '/hqdefault.jpg') }}" /><i class="fa fa-play-circle"></i></a>
			          </p>
					@endif
				@endif
			@endif

			<!-- Bandcamp Formatting -->
		    @if($post->type == 'music')
		    	<!-- YouTube -->
		    	@if($post->source != '')
					@if(strstr($post->source, 'bandcamp'))
						<div class="media-bandcamp">
							<iframe style="border: 0; width: 100%; height: 42px;" src="http://bandcamp.com/EmbeddedPlayer/{{ $post->source_bandcamp }}/size=small/bgcol=ffffff/linkcol=7137dc/transparent=true/" seamless></iframe>
						</div>
					@endif
				@endif
			@endif

			<!-- Photo Formatting -->
			@if($post->type == 'photo' || $post->type == 'photos')
				<div class="media-photo">
					<a href="{{ $post->picture }}" class="{{($browser['isMobile'] ?: 'fancybox')}} thumbnail overlay-icon" title="{{ $post->link_name }}">
						<img class="th unveil"src="/img/gallery-fallback.png" data-src="/douglas/nphotos/{{ urlencode($post->picture) }}" alt="{{ strtotime($post->created_time) }}" />
						<i class="fa fa-plus-circle"></i>
					</a>
				</div>
			@endif
			<hr>

			@endforeach

			{{ $posts->links() }}
		</div>
	</div>
</div>