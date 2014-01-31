@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new download</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.downloads.store' ]) }}

		{{ Form::text('title'); }}
		{{ Form::text('url'); }}
		{{ Form::text('order'); }}
		{{ Form::text('size'); }}
		{{ Form::text('type'); }}

		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Download') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop