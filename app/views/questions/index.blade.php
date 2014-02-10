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
					<td>Last Updated</td>
					<td></td>
				</tr>
			</thead>

			<tbody>
				@foreach($questions as $question)
				<tr>
					<td>{{ $question->category->title }}</td>
					<td><a href="/admin/questions/{{ $question->id }}/edit">{{ $question->question }}</a></td>
					@if(!is_null($question->updated_by))
					<td>{{ $question->updated_at->diffForHumans() }} by {{ $question->updatedBy->first_name }} {{ $question->updatedBy->last_name }}</td>
					@else
						<td>{{ $question->created_at->diffForHumans() }} by {{ $question->createdBy->first_name }} {{ $question->createdBy->last_name }}</td>
					@endif
					<td>
						{{ Form::delete('admin/questions/'. $question->id, 'X', null, array('class' => 'button tiny alert')) }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop