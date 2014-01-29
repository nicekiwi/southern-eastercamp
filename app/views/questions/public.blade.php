@extends('layouts.master')

@section('content')

<div class="row">
	<div class="small-12 columns">

		<h2>{{ $question->question }}</h2>
		
		{{ $question->answer }}
	</div>
</div>

@stop