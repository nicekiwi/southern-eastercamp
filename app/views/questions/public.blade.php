<div class="container">
	<div class="row">
	    <div class="col-xs-12">
			
			<h2>{{ $question->question }}</h2>
			<p><strong>QUESTION #{{ $question->id }}</strong></p>
			
			{{ $question->answer }}

			@if($question->tags != '')
			<p><strong>TAGS:</strong> {{ $question->tags }}</p>
			@endif
			
			<p><a href="{{ URL::previous() }}">&lt;- Return to previous page</a></p>
		</div>
	</div>
</div>