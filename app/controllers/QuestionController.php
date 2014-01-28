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

	public function index_public()
	{
		$categories = QuestionCategory::orderBy('order','desc')->get();

		return View::make('questions.public')->with(compact('question'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = ['' => 'Select a Category'] + QuestionCategory::orderBy('order','asc')->lists('title', 'id');

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
			'question'      => 'required',
			'answer'      	=> 'required',
			'order'      	=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation Error');
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
		Session::flash('success_message', 'Question has been aded.');

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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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