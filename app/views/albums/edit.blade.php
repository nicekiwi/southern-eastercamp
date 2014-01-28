@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Edit Album</h2>

		{{ Form::model($album, [ 'method' => 'PATCH', 'route' => ['admin.albums.update', $album->id] ]) }}

		{{ Form::selectRange('year', 2006, 2020); }}

		{{ Form::submit('Add Album') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop