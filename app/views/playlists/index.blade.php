@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Video Playlists</h2>

		<p><a href="/admin/playlists/create" class="button small"><i class="fa fa-plus"></i> Add Playlist</a></p>

		@foreach ($playlists as $playlist)

		<h3>{{ $playlist->title }} (<a href="/admin/playlists/{{ $playlist->id }}/edit">edit</a>)</h3>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Title</td>
					<td>Link</td>
					<td>Public</td>
					<td>Added</td>
				</tr>
			</thead>

			<tbody>
				@foreach($playlist->videos as $video)
				<tr>
					<td>{{ $video->order }}</td>
					<td><a href="/admin/videos/{{ $video->id }}/edit">{{ $video->title }}</a></td>
					<td><a class="fancybox" data-title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}">{{ $video->url }}</a></td>
					<td>{{ $video->public }}</td>
					<td>{{ $video->created_at->diffForHumans() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@endforeach
	</div>
</div>

@stop