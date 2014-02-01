@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Create Download</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.downloads.store' ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'File Title:') }}
		{{ Form::text('title'); }}

		{{ Form::label('url', 'File Location:') }}
		{{ Form::text('url'); }}

		{{ Form::label('size', 'File Size:') }}
		{{ Form::text('size'); }}

		{{ Form::label('type', 'File Type:') }}
		{{ Form::text('type'); }}

		{{ Form::label('public', 'Display Publicly:') }}
		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Download') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop