<div class="row">
	<div class="small-12 columns">

		@foreach ($categories as $category)
		<h2>{{ $category->title }}</h2>
		
		<ul class="small-block-grid-1 medium-block-grid-2">
			@foreach ($category->questions as $question)
			<li><a href="/faq/question/{{ $question->id }}">{{ $question->question }}</a></li>
			@endforeach
		</ul>
		@endforeach
	</div>
</div>