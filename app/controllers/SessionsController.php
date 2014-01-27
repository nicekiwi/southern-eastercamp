<?php

class SessionsController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()) return Redirect::to('/admin');

		$this->layout->content = View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$attempt = Auth::attempt([
			'email' => $input['email'],
			'password' => $input['password']
		]);

		if($attempt) {
			Session::flash('success_message', 'Login was a great success.');
			return Redirect::intended('/admin');
		}

		Session::flash('error_message', 'Invalid Username or Password.');
		return Redirect::to('login');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Auth::logout();

		return Redirect::home();
	}

}