@extends('layouts.master')

@section('title','information')
@section('desc','')
@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Downloads</h1>

		<ul class="no-bullet">
			@foreach($downloads as $item)
			<li><i class="fa fa-file-text fa-lg"></i> <a href="{{ $item->url }}" target="_blank">{{ $item->desc }}</a> <small>({{ number_format($item->size) }} KB)</small></li>
			@endforeach
		</ul>
	</div>
</div>

@stop