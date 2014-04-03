<div class="row content-top">
	<div class="small-12 columns">
		
		<h2>{{ $question->question }}</h2>
		<p><strong>QUESTION #{{ $question->id }}</strong></p>
		
		{{ $question->answer }}

		@if($question->tags != '')
		<p><strong>TAGS:</strong> {{ $question->tags }}</p>
		@endif

		<p>&nbsp;</p>
		
		<p><a href="{{ URL::previous() }}">&lt;- Return to previous page</a></p>
	</div>
</div>