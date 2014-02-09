<div class="row content-top">
	<div class="small-12 columns">

		<h1>Frquently Asked Questions</h1>

		<dl class="sub-nav">
		  <dt>Filter:</dt>
		  <dd class="{{ (Request::segment(2) == '') ? 'active' : '' }}"><a href="/faq">All</a></dd>
		  @foreach ($global_categories as $category)
		  <dd class="{{ (Request::segment(2) == $category->slug) ? 'active' : '' }}"><a href="/faq/{{ $category->slug }}">{{ $category->title }}</a></dd>
		  @endforeach
		</dl>

		<table id="faq-table">
			<!-- <thead>
				<tr>
					<td>Question</td>
				</tr>
			</thead> -->
			<tbody>
				@foreach ($questions as $question)
				@if($question->public > 0)
				<tr>
					<td><a href="/faq/question/{{ $question->id }}">{{ $question->question }}</a></td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>