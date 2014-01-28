@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>All FAQ</h2>

		<p><a href="/admin/questions/create" class="button small"><i class="fa fa-plus"></i> Add Question</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Title</td>
					<td>Category</td>
					<td>Added</td>
					<td>x</td>
				</tr>
			</thead>

			<tbody>
				@foreach($questions as $question)
				<tr>
					<td>{{ $question->order }}</td>
					<td><a href="/admin/questions/{{ $question->id }}/edit">{{ $question->question }}</a></td>
					<td>{{ $question->category->title }}</td>
					<td>{{ $question->created_at }}</td>
					<td>delete_btn</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop