@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new category</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.question-categories.store' ]) }}

		{{ Form::text('title'); }}
		{{ Form::text('order'); }}

		{{ Form::submit('Add Category') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop