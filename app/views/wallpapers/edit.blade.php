@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update Wallpaper</h2>

		{{ Form::model($wallpaper, [ 'method' => 'PATCH', 'route' => ['admin.wallpapers.update', $wallpaper->id] ]) }}

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
		{{ Form::checkbox('public', 1); }}

		{{ Form::submit('Update Wallpaper') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop