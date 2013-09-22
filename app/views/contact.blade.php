@extends('layouts.master')

@section('content')

<h1>Contact Us</h1>

{{ Form::open(array('url' => 'contact-us', 'id' => 'contact-form')) }}

<div class="contact-name">
	{{ Form::text('sender_name', Input::old('sender_name'), array('id'=>'sender_name', 'placeholder' => 'Full Name', 'class'=> $errors->has('sender_name') ? 'contact_error' : '')) }}
	{{ Form::text('sender_email', Input::old('sender_email'), array('id'=>'sender_email', 'placeholder' => 'Email Address', 'class'=> $errors->has('sender_email') ? 'contact_error' : '')) }}
</div>
<div class="contact-question">
	{{ Form::text('sender_question', Input::old('sender_question'), array('id'=>'sender_question', 'placeholder' => 'What do you want to contact us about?', 'class'=> $errors->has('sender_question') ? 'contact_error' : '')) }}
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

<address>
	<strong>The EC Office:</strong><br />EC13, PO BOX 5533<br />Christchurch, 8542
</address>
<address>
	<strong>Canterbury Youth Services:</strong><br />472 Cranford St <small>(Above Chipmunks)</small><br />Redwood, 8051<br />Christchurch<br />
	<a href="tel:6433542181">+64 (03) 354-2181</a><br />
	<a href="http://www.cys.org.nz" target="_blank" title="Canterbury Youth Services Website">View website</a>
</address>

<address>
	<strong>Spencer Beach Holiday Park:</strong><br />110 Heyders Road<br />Spencerville, 8083<br />Christchurch<br />             
	<a href="http://maps.google.co.nz/maps?hl=en&amp;sugexp=gsis,i18n%3Dtrue&amp;cp=11&amp;gs_id=18&amp;xhr=t&amp;gs_upl=&amp;bav=on.2,or.r_gc.r_pw.&amp;biw=1920&amp;bih=962&amp;um=1&amp;ie=UTF-8&amp;cid=0,0,2617637615047447768&amp;fb=1&amp;hq=spencer+beach+holiday+park&amp;gl=nz&amp;daddr=110+Heyders+Rd,+Bottle+Lake,+Christchurch+8083&amp;geocode=16592704219413066630,-43.430300,172.703000&amp;ei=pvZqTvH4DaGsiAfcyei6BA&amp;sa=X&amp;oi=local_result&amp;ct=directions-to&amp;resnum=1&amp;sqi=2&amp;ved=0CEEQngIwAA" target="_blank">Get Directions</a><br />
	<a href="http://www.spencerbeachholidaypark.co.nz/" target="_blank" title="Spencer Beach Holiday Park Website">View website</a>
</address>


@stop