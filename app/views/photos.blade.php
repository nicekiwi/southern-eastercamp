@extends('layouts.master')

@section('title','Photos')
@section('desc','')
@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Information</h1>

		<ul id="album-photos" class="small-block-grid-4">
		@foreach ($albums as $album)

			<li>

			<h3>{{ $album['name'] }}</h3>

		    
				@if(isset($album['cover_photo']))
		        <img class="th" src="https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-frc1/p206x206/604153_{{ $album['cover_photo'] }}_{{ $album['id'] }}_n.jpg" />
		        @endif
		    </li>

		@endforeach
		</ul>
	</div>
</div>