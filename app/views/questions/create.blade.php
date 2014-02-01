@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new question</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.questions.store' ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('category_id', 'Category:') }}
		{{ Form::select('category_id', $categories) }}

		{{ Form::label('question', 'Question:') }}
		{{ Form::text('question'); }}

		{{ Form::label('answer', 'Answer:') }}
		{{ Form::textarea('answer'); }}

		{{ Form::label('public', 'Dislpay Publicly:') }}
		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Question') }}
		    
		{{ Form::close() }}
	</div>
</div>

@stop