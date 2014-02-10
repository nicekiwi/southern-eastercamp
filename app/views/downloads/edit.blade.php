@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Download</h2>

		{{ Form::model($download, [ 'method' => 'PATCH', 'route' => ['admin.downloads.update', $download->id] ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'File Title:') }}
		{{ Form::text('title'); }}

		{{ Form::label('url', 'File Location:') }}
		{{ Form::text('url'); }}

		{{ Form::label('size', 'File Size: (KB)') }}
		{{ Form::text('size'); }}

		{{ Form::label('type', 'File Type: (pdf, doc, zip etc..)') }}
		{{ Form::text('type'); }}

		{{ Form::label('public', 'Display Publicly:') }}
		{{ Form::checkbox('public', 1); }}

		{{ Form::submit('Update Download') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop