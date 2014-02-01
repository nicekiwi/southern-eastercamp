@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Create category</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.question-categories.store' ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title'); }}

		{{ Form::submit('Create Category') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop