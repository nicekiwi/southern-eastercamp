@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>All FAQ</h2>

		<p><a href="/admin/questions/create" class="button small"><i class="fa fa-plus"></i> Add Question</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Category</td>
					<td>Title</td>
					<td>Updated</td>
					<td></td>
				</tr>
			</thead>

			<tbody>
				@foreach($questions as $question)
				<tr>
					<td>{{ $question->category->title }}</td>
					<td><a href="/admin/questions/{{ $question->id }}/edit">{{ $question->question }}</a></td>
					<td>{{ $question->updated_at->diffForHumans() }} by {{ $question->updatedBy->first_name }} {{ $question->updatedBy->last_name }}</td>
					<td>
						{{ Form::open(array('url' => '/admin/questions/' . $question->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('X', array('class' => 'button tiny alert')) }}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop