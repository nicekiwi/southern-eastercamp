@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>Users</h2>

		<p><a href="/admin/users/create" class="button small"><i class="fa fa-plus"></i> Add User</a></p>

		<table width="100%">
			<thead>
				<tr>
					<td>Group</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Email Address</td>
					<td>Last Login</td>
					<td>Created</td>
					<td>x</td>
				</tr>
			</thead>

			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->group->title }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td><a href="/admin/users/{{ $user->id }}/edit">{{ $user->email }}</a></td>
					<td>
					@if($user->last_login !== null)
					{{ $user->last_login->diffForHumans() }}
					@endif
					</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
					<td>delete_btn</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop