<?php

class GroupController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::orderBy('id','asc')->get();
		$this->layout->content = View::make('groups.index')->with(compact('groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('groups.create');
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
			'title'      		=> 'required|unique:groups',
			'permissions'      	=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/groups/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$group = new Group;
		$group->title = Input::get('title');
		$group->permissions = Input::get('permissions');

		$group->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' group has been aded.');

		return Redirect::to('admin/groups');
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
		$group = Groups::findOrFail($id);
		$this->layout->content = View::make('groups.edit')->with(compact('group'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title'      		=> 'required|unique:groups,title' . $id,
			'permissions'      	=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/groups/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$group = new Group;
		$group->title = Input::get('title');
		$group->permissions = Input::get('permissions');

		$group->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' group has been updated.');

		return Redirect::to('admin/groups');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}