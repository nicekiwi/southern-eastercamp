@extends('layouts.master')

@section('content')
      
  <h1>News</h1>
  
  <hr>

<div class="row">
@foreach ($news as $news_item)
	<div class="news-post-box col-sm-4 col-md-4">

		<!--<div class="news-post-details">
			<span class="label label-info">{{ date("M jS",strtotime($news_item->created_time)) }}</span>
			<span>{{ Comman::elapsedTime(strtotime($news_item->created_time)) }}</span>
			<img style="margin-left:5px;margin-top:-3px;" width="16" src="/images/icons/news/{{ $news_item->type }}.png" />
		</div>-->

		<div class="news-post">
			<p>
				<small class="news-since"><span>{{ Comman::elapsedTime(strtotime($news_item->created_time)) }}</span><img style="margin-left:5px;margin-top:-3px;" width="16" src="/img/icons/news/{{ $news_item->type }}.png" /></small>
				@if($news_item->message != '')
					- {{ $news_item->message }} 
					@if(!strstr($news_item->message, 'http') && $news_item->link != '' && !strstr($news_item->link, 'facebook') && !strstr($news_item->type, 'video'))
						<a href="{{ $news_item->link }}" title="{{ $news_item->link_name }}" target="_blank">{{ $news_item->link }}</a>
					@endif
				@endif

				@if($news_item->status_type == 'added_photos' && $news_item->link_name != '')
					- <a href="{{ $news_item->link }}" target="_blank" title="{{ $news_item->link_name }}">{{ $news_item->link_name }}</a>
					@if($news_item->link_caption != '')
						<small> (Added {{ $news_item->link_caption }})</small>
					@endif
				@endif
			</p>

		    <!-- Video Formatting -->
		    @if($news_item->type == 'video')
		    	@if($news_item->source != '')
		    		@if(strstr($news_item->source, 'youtube'))
						<div class="media-video">
							<a target="_blank" href="http://www.youtube.com/watch?v={{ rawurldecode(substr($news_item->picture, 112,11)) }}" class="{{(Holmes::is_mobile() ? '' : 'fancybox')}}" title="{{ $news_item->link_name }}">
								<img class="lazy" src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&amp;url={{ rawurldecode(substr($news_item->picture, 79,44)) }}/hqdefault.jpg&amp;height=155&amp;width=280" />
								<i class="media-play-btn"></i>
								<p>{{ $news_item->link_name }}</p>
							</a>
						</div>
					@endif
				@endif
			@endif

			<!-- Bandcamp Formatting -->
		    @if($news_item->type == 'music')
		    	<!-- YouTube -->
		    	@if($news_item->source != '')
					@if(strstr($news_item->source, 'bandcamp'))
						<noscript>
							<p><strong class="label label-warning">JavaScript is required for this plugin to function.</strong></p>
						</noscript>
						<div class="media-bandcamp">
						@if(Holmes::is_mobile())
							<iframe width="100%" height="100" style="position: relative; display: block; width: 100%; height: 100px;" src="http://bandcamp.com/EmbeddedPlayer/v=2/{{ $news_item->source_bandcamp }}/size=grande/bgcol=eeeeee/linkcol=4285BB/" allowtransparency="true" frameborder="0"><a href="http://satellite.bandcamp.com/album/satellite-2012">Satellite 2012 by Satellite</a></iframe>
						@else

							<iframe style="border: 0; max-width: 200px;" src="http://bandcamp.com/EmbeddedPlayer/{{ $news_item->source_bandcamp }}/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/" seamless><a href="http://satellite.bandcamp.com/album/satellite-live-2013">Satellite Live 2013 by Satellite</a></iframe>
						@endif
						</div>
					@endif
				@endif
			@endif

			<!-- Photo Formatting -->
			@if($news_item->type == 'photo' || $news_item->type == 'photos')
				<div class="media-photo">
					<a target="" href="{{ $news_item->picture_large }}" class="{{(Holmes::is_mobile() ? 'mobile-photo' : 'fancybox')}}" title="{{ $news_item->link_name }}">
						<img class="lazy" src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&amp;url={{ $news_item->picture }}&amp;height=155&amp;width=280" alt="{{ Comman::elapsedTime(strtotime($news_item->created_time)) }}" />
					</a>
				</div>
			@endif
		</div>

		
	</div>
@endforeach
</div>
@stop