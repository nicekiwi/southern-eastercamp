<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('group_id','asc')->get();

		$this->layout->content = View::make('users.index')->with(compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Group::count() === 0) {
			Session::flash('error_message', 'You must create a group before you can create a user.');
			return Redirect::intended('admin/users');
		}

		$groups = Group::orderBy('id','asc')->lists('title', 'id');

		$this->layout->content = View::make('users.create')->with(compact('groups'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'first_name'      	=> 'required',
			'last_name'      	=> 'required',
			'email'      		=> 'Required|Between:3,64|Email|Unique:users',
			'password'  		=> 'Required|AlphaNum|Between:6,24|Confirmed',
        	'password_confirmation'=>'Required|AlphaNum|Between:6,24'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/users/create')
				->withErrors($validator)
				->withInput(Input::except('password','password_confirmation'));
		}

		// Store
		$user = new User;
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		$user->group_id = Input::get('group_id');

		$user->save();

		// redirect
		Session::flash('success_message', 'User ' . Input::get('first_name') . ' ' . Input::get('last_name') . ' has been updated.');

		return Redirect::to('admin/users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$groups = Group::orderBy('id','asc')->lists('title', 'id');

		$this->layout->content = View::make('users.edit')->with(compact('groups','user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'first_name'      	=> 'required',
			'last_name'      	=> 'required',
			'email'      		=> 'Required|Between:3,64|Email|Unique:users,email,' . $id,
		];

		if(Input::get('password') !== '' && Input::get('password_confirmation') !== '' ) 
		{
			$password_rules = [
				'password'  			=> 'Required|AlphaNum|Between:6,24|Confirmed',
        		'password_confirmation'	=>'Required|AlphaNum|Between:6,24'
			];

			$rules = array_merge($rules, $password_rules);
		}

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password','password_confirmation'));
		}

		$user = User::findOrFail($id);

		// Make sure the last admin cannot lock themselves out
		if($user->group_id === 5 && Input::get('group_id') > 5 && User::where('group_id',5)->count() === 1)
		{
			Session::flash('error_message', 'You are the only Admin! You can not demote yourself.');
			return Redirect::to('admin/users/' . $id . '/edit')
				->withInput(Input::except('password','password_confirmation'));
		}

		// Store
		//$user = User::findOrFail($id);
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');

		if(Input::get('password') !== '') $user->password = Hash::make(Input::get('password'));

		$user->group_id = Input::get('group_id');

		$user->save();

		// redirect
		Session::flash('success_message', 'User ' . Input::get('first_name') . ' ' . Input::get('last_name') . ' has been updated.');

		return Redirect::to('admin/users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::findOrFail($id);
		$user->delete();

		// redirect
		Session::flash('success_message', 'User has been deleted.');
		return Redirect::to('admin/users');
	}

}