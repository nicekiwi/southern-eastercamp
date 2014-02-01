<?php

class QuestionController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::orderBy('order','desc')->get();
		$this->layout->content = View::make('questions.index')->with(compact('questions'));
	}

	public function index_public($id)
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		$question = Question::where('id',$id)->first();

		// If Category does not exist, call 404
		if(!isset($question->id)) return App::abort(404);

		// Input Meta info if set
		$this->layout->metaTitle = $question->question . ' - FAQ #' . $question->id;
		$this->layout->metaDesc = substr(strip_tags($question->answer), 0, 150);

		$this->layout->content = View::make('questions.public');
		$this->layout->content->question = $question;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(QuestionCategory::count() === 0) {
			Session::flash('error_message', 'You must create a category before you can create a question.');
			return Redirect::intended('admin/questions');
		}

		$categories = QuestionCategory::orderBy('order','asc')->lists('title', 'id');
		$this->layout->content = View::make('questions.create')->with(compact('categories'));
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
			'question'      => 'required|unique:questions',
			'answer'      	=> 'required',
			'order'      	=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/questions/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$question = new Question;
		$question->question = Input::get('question');
		$question->answer = Input::get('answer');
		$question->order = Input::get('order');

		$question->category_id = Input::get('category_id');

		$question->save();

		// redirect
		Session::flash('success_message', 'Question has been added.');

		return Redirect::to('admin/questions');
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
		$categories = QuestionCategory::orderBy('order','asc')->lists('title', 'id');
		$question = Question::findOrFail($id);

		$this->layout->content = View::make('questions.edit')->with(compact('categories','question'));
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
			'question'      => 'required|unique,question,' . $id,
			'answer'      	=> 'required',
			'order'      	=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$question = Question::findOrFail($id);
		$question->question = Input::get('question');
		$question->answer = Input::get('answer');
		$question->order = Input::get('order');

		$question->category_id = Input::get('category_id');

		$question->save();

		// redirect
		Session::flash('success_message', 'Question has been upated.');

		return Redirect::to('admin/questions');
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