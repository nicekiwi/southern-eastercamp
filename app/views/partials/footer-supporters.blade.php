<h5>Proudly Supported by</h5>
<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6">
  @foreach($supporters as $supporter)
  <li><a target="_blank" href="{{ $supporter->url }}"><img class="grayscale supporter-img" src="/img/supporters/{{ $supporter->slug }}.png" /></a></li>
  @endforeach
</ul>