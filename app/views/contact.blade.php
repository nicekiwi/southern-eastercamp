<div class="row content-top">
	<div class="small-12 columns">

		{{ $content }}

		{{ Form::open([ 'method' => 'POST', 'route' => 'contact.store', 'id' => 'contact-form']) }}

		<div class="row">
			<div class="small-12 medium-6 columns">
				{{ Form::text('sender_name', $value = null, array('required' => '', 'id'=>'sender_name', 'placeholder' => 'Full Name', 'class'=> $errors->has('sender_name') ? 'contact_error' : '')) }}
			</div>

			<div class="small-12 medium-6 columns">
				{{ Form::email('sender_email', $value = null, array('required' => '', 'id'=>'sender_email', 'placeholder' => 'Email Address', 'class'=> $errors->has('sender_email') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				{{ Form::text('sender_question', $value = null, array('required' => '', 'id'=>'sender_question', 'placeholder' => 'What is this about?', 'class'=> $errors->has('sender_question') ? 'contact_error' : '')) }}
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<div id="faq-query-results" class="hidden">
					<p><strong>Check these first:</strong></p>
					<ul class="small-block-grid-1">

					</ul>
				</div>
			</div>
		</div>

		<div class="contact-message">
			{{ Form::textarea('sender_message', $value = null, array('required' => '', 'id'=>'sender_message', 'placeholder' => 'Your detailed message.', 'class'=> $errors->has('sender_message') ? 'contact_error' : '')) }}
		</div>

		<div class="contact-submit">
			<p>{{ Form::submit('Send Message', ['class'=>'button success radius']) }}</p>
		</div>

		{{ Form::hidden('email') }}

		{{ Form::token() . Form::close() }}
	</div>
	<div class="small-12 medium-6 columns">
		<address>
			<h3>Canterbury Youth Services Office:</h3>
				<p>472 Cranford St 
			<small>(Above Chipmunks)</small><br>
				Redwood, 8051
			<br>
				Christchurch
			<br>
			<a href="tel:33542181">(03) 354-2181</a></p>
			<p><a href="http://www.cys.org.nz" target="_blank" title="Canterbury Youth Services Website">View website</a></p>
		</address>

	</div>
	<div class="small-12 medium-6 columns">

		<address>
			<h3>Onsite EC Camp Office:</h3>
				<p>110 Heyders Road
			<br>
				Spencerville, 8083
			<br>
				Christchurch
			<br>
				<a href="tel:33542181">(03) 354-2181</a>
			</p>
			<p><a href="http://maps.google.co.nz/maps?hl=en&sugexp=gsis,i18n%3Dtrue&cp=11&gs_id=18&xhr=t&gs_upl=&bav=on.2,or.r_gc.r_pw.&biw=1920&bih=962&um=1&ie=UTF-8&cid=0,0,2617637615047447768&fb=1&hq=spencer+beach+holiday+park&gl=nz&daddr=110+Heyders+Rd,+Bottle+Lake,+Christchurch+8083&geocode=16592704219413066630,-43.430300,172.703000&ei=pvZqTvH4DaGsiAfcyei6BA&sa=X&oi=local_result&ct=directions-to&resnum=1&sqi=2&ved=0CEEQngIwAA" target="_blank">Get Directions</a></p>
		</address>
	</div>
</div>