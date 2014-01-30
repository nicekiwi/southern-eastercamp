@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Question</h2>

		{{ Form::model($question, [ 'method' => 'PATCH', 'route' => ['admin.questions.update', $question->id] ]) }}

		{{ Form::select('category_id', $categories) }}

		{{ Form::text('question'); }}
		{{ Form::textarea('answer'); }}
		{{ Form::text('order'); }}

		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Question') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop