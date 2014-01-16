@extends('layouts.master')

@section('title','Photos')
@section('desc','')
@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Information</h1>

		<ul id="album-photos" class="photo-items">
		@foreach ($albums as $album)
		  @foreach ($album as $photo)
		    <li class="tm-medium">
		      <a target="{{(Holmes::is_mobile() ? '' : '_blank')}}" data-thumbnail="http://fancyapps.com/fancybox/demo/2_s.jpg" href="{{ $photo->link_large }}" class="{{(Holmes::is_mobile() ? 'mobile-photo' : 'fancybox')}}" rel="photo-gallery" title="Eastercamp Photo #{{ $photo->id }}">
		        <img class="lazy {{ $photo->class }}" data-original="{{ substr($photo->link_large, 0, 44) }}/p200x200/{{ $photo->link_thumb }}_n.jpg" alt="Eastercamp Photo {{ $photo->id }}" width="288" />
		      </a>
		    </li>
		  @endforeach
		@endforeach
		</ul>
	</div>
</div>