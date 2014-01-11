<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">

	@foreach($photos as $photo)
		<li><img class="th" src="{{ $photo->link_large }}" /></li>
	@endforeach

</ul>