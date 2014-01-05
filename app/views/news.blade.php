@extends('layouts.master')

@section('content')

<div class="row">
	<div class="small-12 columns">
	 
		<h1>News</h1>

		<ul id="news-posts" class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">

		@foreach ($news as $news_item)

			<!--<div class="news-post-details">
				<span class="label label-info">{{ date("M jS",strtotime($news_item->created_time)) }}</span>
				<span>{{ strtotime($news_item->created_time) }}</span>
				<img style="margin-left:5px;margin-top:-3px;" width="16" src="/images/icons/news/{{ $news_item->type }}.png" />
			</div>-->

			<li class="news-post">
				<p>
					<small class="news-since"><span>{{ strtotime($news_item->created_time) }}</span></small>
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

							@if($browser['isMobile'])
					          <div class="flex-video widescreen youtube">
					            <iframe src="//www.youtube.com/embed/{{ rawurldecode(substr($news_item->picture, 112,11)) }}?rel=0" frameborder="0" allowfullscreen></iframe>
					          </div>
					        @else
					          <a class="lightbox" href="http://www.youtube.com/watch?v={{ rawurldecode(substr($news_item->picture, 112,11)) }}&amp;rel=0" title="{{$news_item->link_name}}">
					            <img class="th" src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&amp;url={{ rawurldecode(substr($news_item->picture, 79,44)) }}/hqdefault.jpg&amp;height=270&amp;width=480" />
					            <i class="fa fa-play-circle"></i>
					          </a>
					        @endif
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
								<iframe style="border: 0;" src="http://bandcamp.com/EmbeddedPlayer/{{ $news_item->source_bandcamp }}/size=large/bgcol=ffffff/linkcol=0687f5/notracklist=true/transparent=true/" seamless></iframe>
							</div>
						@endif
					@endif
				@endif

				<!-- Photo Formatting -->
				@if($news_item->type == 'photo' || $news_item->type == 'photos')
					<div class="media-photo">
						<a target="" href="{{ $news_item->picture_large }}" class="{{($browser['isMobile'] ? 'mobile-photo' : 'lightbox')}}" title="{{ $news_item->link_name }}">
							<img class="lazy th" src="https://i.embed.ly/1/display/crop?key=d5a004fad9d94741b9ea438a9b802b3e&amp;url={{ $news_item->picture }}&amp;height=155&amp;width=280" alt="{{ strtotime($news_item->created_time) }}" />
						</a>
					</div>
				@endif
			</li>
		@endforeach
		</ul>
	</div>
</div>
@stop