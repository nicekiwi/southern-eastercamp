@section('content')

<div class="row">
	<div class="small-3 columns">&nbsp;</div>
	<div class="small-6 columns">
		<h2>Login</h2>

		{{ Form::open(array('route' => 'sessions.store')) }}

		{{ Form::label('email', 'Email Address:') }}
		{{ Form::text('email') }}

		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }}

		{{ Form::submit('Login') }}

		{{ Form::close() }}
	</div>
	<div class="small-3 columns">&nbsp;</div>
</div>

@stop