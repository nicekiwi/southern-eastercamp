{{ $content }}

<div class="row">
	<div class="small-12 medium-12 columns">

		{{ Form::open([ 'method' => 'POST', 'route' => 'contact', 'id' => 'contact-form']) }}

		<div class="row">
			<div class="small-12 medium-6 columns">
				{{ Form::text('sender_name', $value = null, array('id'=>'sender_name', 'placeholder' => 'Full Name', 'class'=> $errors->has('sender_name') ? 'contact_error' : '')) }}
			</div>

			<div class="small-12 medium-6 columns">
				{{ Form::text('sender_email', $value = null, array('id'=>'sender_email', 'placeholder' => 'Email Address', 'class'=> $errors->has('sender_email') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				{{ Form::text('sender_question', $value = null, array('id'=>'sender_question', 'placeholder' => 'What is this about?', 'class'=> $errors->has('sender_question') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<div id="faq-query-results" class="faq-query-contact hidden">
					<strong>Questions that may already have your answer:</strong>
					<ul>

					</ul>
				</div>
			</div>
		</div>

		<div class="contact-message">
			{{ Form::textarea('sender_message', $value = null, array('id'=>'sender_message', 'placeholder' => 'Your detailed message.', 'class'=> $errors->has('sender_message') ? 'contact_error' : '')) }}
		</div>

		<div class="contact-submit">
			{{ Form::submit('Send Message', ['class'=>'button']) }}
			<span class="label label-warning">All fields are required</span>
		</div>

		{{ Form::hidden('email') }}

		{{ Form::token() . Form::close() }}

	</div>
</div>