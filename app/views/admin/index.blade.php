@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="small-12 columns">
		<p>Yay admin..</p>

		<p>Enviroment = "{{ getenv('LARA_ENV') }}".</p>
	</div>
</div>

@stop