@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new video</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.videos.store' ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('playlist_id', 'Playlist:') }}
		{{ Form::select('playlist_id', $playlists) }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title'); }}

		{{ Form::label('url', 'Video ID:') }}
		{{ Form::text('url'); }}

		{{ Form::label('public', 'Display Publicly:') }}
		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Video') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop