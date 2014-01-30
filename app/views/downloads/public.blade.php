@extends('layouts.master')

@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Downloads</h1>

		<ul class="small-block-grid-1">
			@foreach($files as $file)
			<li><i class="fa fa-file-text fa-lg"></i>&nbsp;&nbsp;&nbsp;<a href="{{ $file->url }}" target="_blank">{{ $file->desc }}</a> ({{ number_format($file->size) }} KB)</li>
			@endforeach
		</ul>
	</div>
</div>

@stop