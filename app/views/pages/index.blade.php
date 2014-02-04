@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Pages</h2>

		<p><a href="/admin/pages/create" class="button small"><i class="fa fa-plus"></i> Add page</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Order</td>
					<td>Slug</td>
					<td>Title</td>
					<td>Last Updated</td>
				</tr>
			</thead>

			<tbody>
				@foreach($pages as $page)
				<tr>
					<td>{{ $page->order }}</td>
					<td>{{ $page->slug }}</td>
					<td><a href="/admin/pages/{{ $page->id }}/edit">{{ $page->meta_title }}</a></td>
					@if(!is_null($page->updated_by))
					<td>{{ $page->updated_at->diffForHumans() }} by {{ $page->updatedBy->first_name }} {{ $page->updatedBy->last_name }}</td>
					@else
						<td>{{ $page->created_at->diffForHumans() }} by {{ $page->createdBy->first_name }} {{ $page->createdBy->last_name }}</td>
					@endif
					<td>
						{{ Form::open(array('url' => '/admin/pages/' . $page->id, 'class' => 'pull-right')) }}
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