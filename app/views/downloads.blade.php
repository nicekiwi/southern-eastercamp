@extends('layouts.master')

@section('title','information')
@section('desc','')
@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Downloads</h1>

		<ul class="small-block-grid-1">
			@foreach($downloads as $item)
			<li><i class="fa fa-file-text fa-lg"></i>&nbsp;&nbsp;&nbsp;<a href="{{ $item->url }}" target="_blank">{{ $item->desc }}</a> ({{ number_format($item->size) }} KB)</li>
			@endforeach
		</ul>
	</div>
</div>

@stop