<?php

class ContactController extends \BaseController {

	public function index()
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', 'contact')->first();

		// Input Meta info if set
		$this->layout->metaTitle = $page->meta_title;
		$this->layout->metaDesc = $page->meta_desc;

		$this->layout->content = View::make('contact');
		$this->layout->content->content = $page->content;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::isMethod('post')) return false;

		// Reject Bot
		if(Input::get('email') !== '') Redirect::to('contact');

		$rules = array(
	        'sender_name'       => 'required|max:100',
	        'sender_email'      => 'required|email',
	        'sender_question'   => 'required|max:200',
	        'sender_message'    => 'required|max:1200',
	        // Honeypot, reject if filled
	        'email'    			=> 'max:0',
	    );

	    $validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('contact')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

	    // Sanitise all inputs
	    $data = [
	    	'sender_name' 		=> filter_var(Input::get('sender_name'), FILTER_SANITIZE_STRING),
	    	'sender_email' 		=> filter_var(Input::get('sender_email'), FILTER_SANITIZE_EMAIL),
	    	'sender_question' 	=> filter_var(Input::get('sender_question'), FILTER_SANITIZE_STRING),
	    	'sender_message' 	=> filter_var(Input::get('sender_message'), FILTER_SANITIZE_STRING)
	    ];

	    // Make MD5 string of the form values
	    $cookie_value = md5($data['sender_name'] . $data['sender_email'] . $data['sender_question'] . $data['sender_message']);

	    // If combined form MD5 is the same as the last submission, reject.
	    if(!is_null(Cookie::get('contact-token')) && Cookie::get('contact-token') === $cookie_value)
		{
			Session::flash('error_message', 'You may not send duplicate messages.');
			return Redirect::to('contact');
		}
		
		// Validation has succeeded. Send message.
	    Mail::queue('emails.contact.new-message', $data, function($message) use ($data)
		{
		    $message->from('mailbot@eastercamp.org.nz','EC Mailbot')
		    		->replyTo($data['sender_email'],$data['sender_name'])
		    		->to('info@eastercamp.org.nz','EC Office')
		    		->subject($data['sender_question']);
		});

	    // Send confirmation message
	    Mail::send('emails.contact.confirm-message', $data, function($message) use ($data)
		{
		    $message->to($data['sender_email'],$data['sender_name'])
		    		->from('info@eastercamp.org.nz','EC Office')
		    		->subject('Thanks for contacting the EC Office');
		});

	    // Make cookie to prevent multi submissions
		$cookie = Cookie::make('contact-token', $cookie_value, 2);

	    // Send user to confirmation page
        Session::flash('success_message', 'Awesome! Your message has been successfully sent.');
		return Redirect::to('contact')->withCookie($cookie);
	}

}