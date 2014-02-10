@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Category</h2>

		{{ Form::model($category, [ 'method' => 'PATCH', 'route' => ['admin.question-categories.update', $category->id] ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title'); }}

		{{ Form::submit('Update Category') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop