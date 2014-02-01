<div class="row">
	<div class="small-12 columns">
		<p>QUESTION #{{ $question->id }}</p>
		<h2>{{ $question->question }}</h2>
		
		{{ Markdown::string($question->answer) }}
		<p><a href="{{ URL::previous() }}">&lt;- Return to previous page</a></p>
	</div>
</div>