@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Download</h2>

		{{ Form::model($download, [ 'method' => 'PATCH', 'route' => ['admin.downloads.update', $download->id] ]) }}

		{{ Form::text('title'); }}
		{{ Form::text('url'); }}
		{{ Form::text('order'); }}
		{{ Form::text('size'); }}
		{{ Form::text('type'); }}

		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Update Download') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop