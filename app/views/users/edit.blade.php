@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Update User</h2>

		{{ Form::model($user, [ 'method' => 'PATCH', 'route' => ['admin.users.update', $user->id] ]) }}

		{{ Form::label('group_id', 'Access Group:') }}
		{{ Form::select('group_id', $groups) }}

		{{ Form::label('first_name', 'First Name:') }}
		{{ Form::text('first_name'); }}
		{{ Form::label('last_name', 'Last Name:') }}
		{{ Form::text('last_name'); }}
		{{ Form::label('email', 'Email Address:') }}
		{{ Form::text('email'); }}

		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password'); }}
		{{ Form::label('password_confirmation', 'Confirm Password:') }}
		{{ Form::password('password_confirmation'); }}

		{{ Form::submit('Update User') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop