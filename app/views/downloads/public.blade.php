<div class="row content-top">
	<div class="small-12 medium-6 columns">
		<h1>Downloads</h1>

		<ul class="small-block-grid-1">
			@foreach($files as $file)
			@if($file->public > 0)
			<li><i class="fa fa-arrow-circle-o-down fa-lg"></i></i>&nbsp;<a href="{{ $file->url }}" target="_blank">{{ $file->title }}</a> ({{ number_format($file->size) }} KB)</li>
			@endif
			@endforeach
		</ul>

		<!-- <h2>Wallpapers</h2>

		<ul class="small-block-grid-1 medium-block-grid-2">
			@foreach($images as $image)
			@if($image->public === 1)
			<li><i class="fa fa-file-text fa-lg"></i>&nbsp;&nbsp;&nbsp;<a href="{{ $image->url }}" target="_blank">{{ $image->desc }}</a> ({{ number_format($image->size) }} KB)</li>
			@endif
			@endforeach
		</ul> -->
	</div>
</div>