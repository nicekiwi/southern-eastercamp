@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Question</h2>

		{{ Form::model($question, [ 'method' => 'PATCH', 'route' => ['admin.questions.update', $question->id] ]) }}

		<div class="row">
			<div class="small-12 medium-4 columns">
				{{ Form::label('category_id', 'Category:') }}
				{{ Form::select('category_id', $categories) }}
			</div>

			<div class="small-12 medium-4 columns">
				{{ Form::label('order', 'Display Order:') }}
				{{ Form::text('order'); }}
			</div>

			<div class="small-12 medium-4 columns">
		      {{ Form::label('public', 'Dislpay:') }}
		      {{ Form::checkbox('public', 1, true); }}
		      {{ Form::label('public', 'Dislpay Publicly:') }}
		    </div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				{{ Form::label('question', 'Question:') }}
				{{ Form::text('question'); }}

				{{ Form::label('answer', 'Answer:') }}
				{{ Form::textarea('answer', $value = null, ['class' => 'redactor-editor']); }}

				<br>

				{{ Form::label('tags', 'Tags: (up to 8 related nouns not found in the title, seperated by a space.)') }}
				{{ Form::text('tags'); }}
			</div>
		</div>

		<div class="row" style="margin-top:10px;">
			<div class="small-12 columns">
				{{ Form::submit('Update Question', ['class' => 'button']) }}
				<a href="/admin/questions" class="button alert">Cancel</a>
			</div>
		</div>
		    
		{{ Form::close() }}
	</div>
</div>



@stop