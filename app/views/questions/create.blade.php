@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new question</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.questions.store' ]) }}


		{{ Form::select('category_id', $categories) }}

		{{ Form::text('question'); }}
		{{ Form::textarea('answer'); }}
		{{ Form::text('order'); }}

		{{ Form::submit('Add Question') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop