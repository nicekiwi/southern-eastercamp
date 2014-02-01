@extends('layouts.master')

@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Contact Us</h1>
	</div>
</div>

{{ $page->content }}

<div class="row">
	<div class="small-12 medium-12 columns">

		{{ Form::open(array('url' => 'contact-us', 'id' => 'contact-form')) }}

		<div class="row">
			<div class="small-12 medium-6 columns">
				{{ Form::text('sender_name', Input::old('sender_name'), array('id'=>'sender_name', 'placeholder' => 'Full Name', 'class'=> $errors->has('sender_name') ? 'contact_error' : '')) }}
			</div>

			<div class="small-12 medium-6 columns">
				{{ Form::text('sender_email', Input::old('sender_email'), array('id'=>'sender_email', 'placeholder' => 'Email Address', 'class'=> $errors->has('sender_email') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				{{ Form::text('sender_question', Input::old('sender_question'), array('id'=>'sender_question', 'placeholder' => 'What is this about?', 'class'=> $errors->has('sender_question') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div id="faq-query-results" class="faq-query-contact hidden">
			<strong>Questions that may already have your answer:</strong>
			<ul>

			</ul>
		</div>
		<div class="contact-message">
			{{ Form::textarea('sender_message', Input::old('sender_message'), array('id'=>'sender_message', 'placeholder' => 'Your detailed message.', 'class'=> $errors->has('sender_message') ? 'contact_error' : '')) }}
		</div>

		<div class="contact-submit">
			{{ Form::submit('Send Message', array('class'=>'btn')) }}
			<span class="label label-warning">All fields are required</span>
		</div>

		<div class="hidden" id="sending_mail">
			<p><img src="/images/icons/contact_loading.gif" /> Please wait, your message is being sent.</p>
		</div>


		{{ Form::hidden('email') }}

		{{ Form::token() . Form::close() }}

	</div>


</div>
@stop