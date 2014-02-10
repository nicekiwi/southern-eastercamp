@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="small-12 columns">

		<h1>Administation,</h1>

		<p>Welcome {{ Auth::user()->first_name }}, you are beautiful.</p>
	</div>
</div>

@stop