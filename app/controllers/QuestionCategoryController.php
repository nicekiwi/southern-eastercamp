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
		$categories = QuestionCategory::orderBy('order','asc')->get();

		return View::make('question-categories.public')->with(compact('categories'));
	}

	public function category_public($slug)
	{
		$category = QuestionCategory::where('title', ucfirst($slug))->first();

		// If Category does not exist, call 404
		if(!isset($category->id)) return App::abort(404);

		return View::make('question-categories.public-category')->with(compact('category'));
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
			'title'      => 'required|unique:question-categories',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
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
		Session::flash('success_message', Input::get('title') . ' category has been aded.');

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
			'title'      => 'required|unique:question-categories,title,'.$id,
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('question-categories/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		$category = QuestionCategory::findOrFail($id);
		$category->title = Input::get('title');
		$category->order = Input::get('order');

		$category->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' category has been updated.');

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