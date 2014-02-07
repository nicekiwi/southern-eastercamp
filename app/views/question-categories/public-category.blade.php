<div class="row content-top">
	<div class="small-12 columns">
		<h2>{{ $category->title }}</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-2">
			@foreach ($category->questions as $question)
			@if($question->public > 0)
			<li><a href="/faq/question/{{ $question->id }}">{{ $question->question }}</a></li>
			@endif
			@endforeach
		</ul>
	</div>
</div>