@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update playlist</h2>

		{{ Form::model($playlist, [ 'method' => 'PATCH', 'route' => ['admin.playlists.update', $playlist->id] ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title'); }}

		{{ Form::submit('Update Playlist') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop