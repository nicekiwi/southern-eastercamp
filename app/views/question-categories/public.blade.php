<div class="row content-top">
	<div class="small-12 columns">

		<h1>Frquently Asked Questions</h1>

		<table id="faq-table">
			<thead>
				<tr>
					<td>Category</td>
					<td>Question</td>
				</tr>
			</thead>

			<tbody>
				@foreach ($categories as $category)
				@foreach ($category->questions as $question)
				@if($question->public > 0)
				<tr>
					<td>{{ $category->title }}</td>
					<td><a href="/faq/question/{{ $question->id }}">{{ $question->question }}</a></td>
				</tr>
				@endif
				@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
</div>