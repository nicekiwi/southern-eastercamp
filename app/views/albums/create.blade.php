@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Create Album</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.albums.store' ]) }}

		{{ Form::label('year', 'Album Year:') }}
		{{ Form::selectRange('year', 2015, 2004); }}


		<h3>Selection Albums</h3>

		<table>
			<thead>
				<tr>
					<td>X</td>
					<td>Title</td>
					<td>Count</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($fb_albums as $fb_album)

					@if(strpos($fb_album['name'],': Album') !== false && !in_array($fb_album['id'], $existing))
					<tr>
						<td>{{ Form::checkbox('fb_album_ids[]',$fb_album['id'])  }}</td>
						<td>{{ $fb_album['name'] }}</td>
						@if(isset($fb_album['count']))
						<td>{{ $fb_album['count'] }}</td>
						@endif
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>

		<p>If no results are showen, then there are no matching albums on Facebook that can be added.</p>

		{{ Form::submit('Create Album') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop