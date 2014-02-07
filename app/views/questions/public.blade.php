<div class="row content-top">
	<div class="small-12 columns">
		
		<h2>{{ $question->question }}</h2>
		<p><strong>QUESTION #{{ $question->id }}</strong></p>
		
		{{ Markdown::string($question->answer) }}
		<p><a href="{{ URL::previous() }}">&lt;- Return to previous page</a></p>
	</div>
</div>