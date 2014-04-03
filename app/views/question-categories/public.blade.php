<div class="row content-top">
	<div class="small-12 columns">

		<h1>Frequently Asked Questions</h1>

		<dl class="sub-nav">
		  <dt>Filter:</dt>
		  <dd class="{{ (Request::segment(2) == '') ? 'active' : '' }}"><a href="/faq">All</a></dd>
		  @foreach ($global_categories as $category)
		  <dd class="{{ (Request::segment(2) == $category->slug) ? 'active' : '' }}"><a href="/faq/{{ $category->slug }}">{{ $category->title }}</a></dd>
		  @endforeach
		</dl>

		<input type="text" class="faq-table-filter" placeholder="Keyword Filter">

		<table class="faq-table">
			<thead>
				<tr>
					<td>Questions</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($questions as $question)
				@if($question->public > 0)
				<tr>
					<td><a href="/faq/question/{{ $question->id }}">{{ $question->question }}</a><p class="hidden">{{ $question->tags }}</p></td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>