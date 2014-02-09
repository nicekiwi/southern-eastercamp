<div class="row master-supporters">
    <div class="small-12 columns">
		<p class="center"><b>PRODULY SUPPORTED BY:</b></p>
		<ul class="small-block-grid-2 medium-block-grid-6">
		  @foreach($supporters as $supporter)
		  <li><a target="_blank" href="{{ $supporter->url }}"><img class="grayscale supporter-img" src="/img/supporters/{{ $supporter->slug }}.png" /></a></li>
		  @endforeach
		</ul>
	</div>
</div>