@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="small-12 columns">
		<p>Yay admin..</p>

		<p>PHP Enviroment = "{{ getenv('LARA_ENV'); }}".<br>Laravel Enviroment = "{{ App::environment(); }}".</p>

		@if(App::environment('staging'))
			meow
		@endif
	</div>
</div>

@stop