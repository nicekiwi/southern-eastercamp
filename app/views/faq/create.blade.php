@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new playlist</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.playlists.store' ]) }}

		{{ Form::text('title'); }}
		{{ Form::text('order'); }}

		{{ Form::submit('Add Playlist') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop