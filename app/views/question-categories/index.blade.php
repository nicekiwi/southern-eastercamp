@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>FAQ Categories</h2>

		<p><a href="/admin/question-categories/create" class="button small"><i class="fa fa-plus"></i> Add Category</a> <a href="/admin/questions/create" class="button small"><i class="fa fa-plus"></i> Add Question</a></p>

		@foreach ($categories as $category)

		<h3>{{ $category->title }} (<a href="/admin/question-categories/{{ $category->id }}/edit">edit</a>)</h3>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Question</td>
					<td>Added</td>
				</tr>
			</thead>

			<tbody>
				@foreach($category->questions as $question)
				<tr>
					<td>{{ $question->order }}</td>
					<td>{{ $question->question }}</td>
					<td>{{ $question->created_at }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@endforeach
	</div>
</div>



@stop