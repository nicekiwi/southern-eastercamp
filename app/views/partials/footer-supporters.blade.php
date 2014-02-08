<div class="row master-supporters show-for-medium-up">
    <div class="small-12 columns">
		<p class="center"><b>PRODULY SUPPORTED BY:</b></p>
		<ul class="medium-block-grid-6">
		  @foreach($supporters as $supporter)
		  <li><a target="_blank" href="{{ $supporter->url }}"><img class="grayscale supporter-img" src="/img/supporters/{{ $supporter->slug }}.png" /></a></li>
		  @endforeach
		</ul>
	</div>
</div>