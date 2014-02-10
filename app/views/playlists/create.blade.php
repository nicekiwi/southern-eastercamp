@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new playlist</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.playlists.store' ]) }}

		{{ Form::label('order', 'Display Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title'); }}

		{{ Form::submit('Add Playlist') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop