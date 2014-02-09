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
	
	public function index_public($slug = null)
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		if(is_null($slug))
		{
			// Get Page info from DB if it exists
			$page = Page::where('slug', 'faq')->first();

			// Input Meta info if set
			$this->layout->metaTitle = $page->meta_title;
			$this->layout->metaDesc = $page->meta_desc;

			$questions = Question::orderBy('category_id','asc')->get();
		}
		else
		{
			$category = QuestionCategory::where('slug', $slug)->first();

			// If Category does not exist, call 404
			if(!isset($category->id)) return App::abort(404);

			$questions = Question::where('category_id', $category->id)->get();

			// Input Meta info if set
			$this->layout->metaTitle = $category->title . ' Questions';
			$this->layout->metaDesc = 'Frequently asked ' . $category->title . ' related Questions.';
		}

		$this->layout->content = View::make('question-categories.public');
		$this->layout->content->questions = $questions;
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
		$category 			= new QuestionCategory;
		$category->title 	= Input::get('title');
		$category->slug 	= Str::slug(Input::get('title'));
		$category->order 	= Input::get('order');
		$category->created_by = Auth::user()->id;

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

		$category 			= QuestionCategory::findOrFail($id);
		$category->title 	= Input::get('title');
		$category->slug 	= Str::slug(Input::get('title'));
		$category->order 	= Input::get('order');
		$category->updated_by = Auth::user()->id;

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
		// delete
		$category = QuestionCategory::findOrFail($id);
		$category->delete();

		// redirect
		Session::flash('success_message', 'Category has been deleted.');
		return Redirect::to('admin/question-categories');
	}

}