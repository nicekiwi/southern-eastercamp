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
					<td>Last Updated</td>
					<td></td>
				</tr>
			</thead>

			<tbody>
			@foreach ($albums as $album)
				<tr>
					<td>{{ count(explode(',', $album->albums)) }}</td>
					<td><a href="/admin/albums/{{ $album->id }}/edit">Eastercamp {{ $album->year }}</a></td>
					<td>{{ $album->count }}</td>
					@if(!is_null($album->updated_by))
					<td>{{ $album->updated_at->diffForHumans() }} by {{ $album->updatedBy->first_name }} {{ $album->updatedBy->last_name }}</td>
					@else
						<td>{{ $album->created_at->diffForHumans() }} by {{ $album->createdBy->first_name }} {{ $album->createdBy->last_name }}</td>
					@endif
					<td>
						{{ Form::delete('admin/albums/'. $album->id, 'X', null, array('class' => 'button tiny alert')) }}
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>



@stop