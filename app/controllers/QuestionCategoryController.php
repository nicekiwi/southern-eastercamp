<?php

class QuestionCategoryController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = QuestionCategory::orderBy('order','asc')->get();

		$this->layout->content = View::make('question-categories.index')->with(compact('categories'));
	}
	
	public function index_public()
	{
		$categories = QuestionCategory::orderBy('order','desc')->get();

		return View::make('question-categories.public')->with(compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('question-categories.create');
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
			'title'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation Error');
			return Redirect::to('admin/question-categories/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$category = new QuestionCategory;
		$category->title = Input::get('title');
		$category->order = Input::get('order');

		$category->save();

		// redirect
		Session::flash('success_message', 'Category has been aded.');

		return Redirect::to('admin/question-categories');
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
		$category = QuestionCategory::findOrFail($id);

		$this->layout->content = View::make('question-categories.edit')->with(compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'title'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation Error');
			return Redirect::to('question-categories/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		$category = QuestionCategory::findOrFail($id);
		$category->title = Input::get('title');
		$category->order = Input::get('order');

		$category->save();

		// redirect
		Session::flash('success_message', 'Category has been updated.');

		return Redirect::to('admin/question-categories');
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