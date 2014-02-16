<div class="container">
	<div class="row master-supporters">
	    <div class="col-xs-12">
			<p class="center"><b>PRODULY SUPPORTED BY:</b></p>

			  @foreach($supporters as $supporter)
			  <div class="col-xs-6 col-sm-4 col-md-2"><a target="_blank" href="{{ $supporter->url }}"><img class="grayscale supporter-img" src="/img/supporters/{{ $supporter->slug }}.png" /></a></div>
			  @endforeach

		</div>
	</div>
</div>