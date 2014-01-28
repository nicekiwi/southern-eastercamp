@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Photo Albums</h2>

		<p><a href="/admin/albums/create" class="button small"><i class="fa fa-plus"></i> Add Album</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Sets</td>
					<td>Title / Year</td>
					<td>Photos</td>
					<td>Added</td>
					<td>x</td>
				</tr>
			</thead>

			<tbody>
			@foreach ($albums as $album)
				<tr>
					<td>{{ count(explode(',', $album->albums)) }}</td>
					<td><a href="/admin/albums/{{ $album->id }}/edit">Eastercamp {{ $album->year }}</a></td>
					<td>{{ $album->count }}</td>
					<td>{{ $album->created_at }}</td>
					<td>delete_btn</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>



@stop