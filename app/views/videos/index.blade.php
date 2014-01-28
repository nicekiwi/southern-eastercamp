@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>All Videos</h2>

		<p><a href="/admin/videos/create" class="button small"><i class="fa fa-plus"></i> Add Video</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Title</td>
					<td>Link</td>
					<td>playlist</td>
					<td>Public</td>
					<td>Added</td>
					<td>x</td>
				</tr>
			</thead>

			<tbody>
				@foreach($videos as $video)
				<tr>
					<td>{{ $video->order }}</td>
					<td><a href="/admin/videos/{{ $video->id }}/edit">{{ $video->title }}</a></td>
					<td><a class="fancybox" data-title="{{ $video->title }}" href="http://www.youtube.com/watch?v={{ $video->url }}">{{ $video->url }}</a></td>
					<td>{{ $video->playlist->title }}</td>
					<td>{{ $video->public }}</td>
					<td>{{ $video->created_at }}</td>
					<td>delete_btn</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop