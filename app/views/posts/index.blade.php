@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Facebook Posts</h2>

		<p>There are {{ $count }} posts avaliable.</p><p>Posts are automattically synced from facebook every hour.</p>

		<p><a href="/admin/posts/create" class="button small"><i class="fa fa-plus"></i> Manually Sync Posts</a></p>

		<h4>The last 15 posts:</h4>
		<table width="100%">
			<thead>
				<tr>
					<td>ID</td>
					<td>Posted</td>
				</tr>
			</thead>

			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->fb_id }}</td>
					<td>{{ $post->posted_at->diffForHumans() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@stop