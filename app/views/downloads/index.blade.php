@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>All Files</h2>

		<p><a href="/admin/downloads/create" class="button small"><i class="fa fa-plus"></i> Add Download</a></p>

		<p>All downloads should be hosted off-site on Dropbox or Similar.</p>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Title</td>
					<td>Link</td>
					<td>Public</td>
					<td>Added</td>
					<td>x</td>
				</tr>
			</thead>

			<tbody>
				@foreach($files as $file)
				<tr>
					<td>{{ $file->order }}</td>
					<td><a href="/admin/videos/{{ $file->id }}/edit">{{ $file->title }}</a></td>
					<td><a target="_blank" href="{{ $file->url }}">{{ $file->url }}</a></td>
					<td>{{ $file->public }}</td>
					<td>{{ $file->updated_at->diffForHumans() }} by {{ $file->updatedBy->first_name }} {{ $file->updatedBy->last_name }}</td>
					<td>
						{{ Form::open(array('url' => '/admin/downloads/' . $file->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('X', array('class' => 'button tiny alert')) }}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop