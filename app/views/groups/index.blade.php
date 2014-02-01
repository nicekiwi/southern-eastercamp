@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>User Groups</h2>

		<p><a href="/admin/groups/create" class="button small"><i class="fa fa-plus"></i> Add Group</a></p>

		@foreach ($groups as $group)

		<h3>{{ $group->title }} (ID{{ $group->id }}) (<a href="/admin/groups/{{ $group->id }}/edit">edit</a>)</h3>

		<p>{{ $group->permissions }}</p>

		<table width="100%">
			<thead>
				<tr>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Email Address</td>
					<td>Last Login</td>
					<td>Created</td>
				</tr>
			</thead>

			<tbody>
				@foreach($group->users as $user)
				<tr>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>
					@if($user->last_login !== null)
					{{ $user->last_login->diffForHumans() }}
					@endif
					</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@endforeach
	</div>
</div>



@stop