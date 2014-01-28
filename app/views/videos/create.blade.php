@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Add new video</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.videos.store' ]) }}


		{{ Form::select('playlist_id', $playlists/* , Input::old('playlist')*/) }}

		{{ Form::text('title'); }}
		{{ Form::text('url'); }}
		{{ Form::text('order'); }}

		{{ Form::checkbox('public', 1, true); }}

		{{ Form::submit('Add Video') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop