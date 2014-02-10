@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Wallpapers</h2>

		<p><a href="/admin/wallpapers/create" class="button small"><i class="fa fa-plus"></i> Add Wallpaper</a></p>

		<p>All wallpapers should be hosted off-site on Dropbox or Similar.</p>

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
				@foreach($images as $image)
				<tr>
					<td>{{ $image->order }}</td>
					<td><a href="/admin/wallpapers/{{ $image->id }}/edit">{{ $image->title }}</a></td>
					<td><a target="_blank" href="{{ $image->url }}">{{ $image->url }}</a></td>
					<td>{{ $image->public }}</td>
					@if(!is_null($image->updated_by))
					<td>{{ $image->updated_at->diffForHumans() }} by {{ $image->updatedBy->first_name }} {{ $image->updatedBy->last_name }}</td>
					@else
						<td>{{ $image->created_at->diffForHumans() }} by {{ $image->createdBy->first_name }} {{ $image->createdBy->last_name }}</td>
					@endif
					<td>
						{{ Form::open(array('url' => '/admin/wallpapers/' . $image->id, 'class' => 'pull-right')) }}
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