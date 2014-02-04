<?php

class WallpaperController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = Wallpaper::orderBy('order','desc')->get();
		$this->layout->content = View::make('wallpapers.index')->with(compact('images'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('wallpapers.create');
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
			'url'      => 'required|unique:wallpapers',
			'size'      => 'required',
			'type'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/wallpapers/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$category = new Wallpaper;
		$category->title = Input::get('title');
		$category->url = Input::get('url');
		$category->size = Input::get('size');
		$category->type = Input::get('type');
		$category->order = Input::get('order');
		$category->public = Input::get('public');
		$category->created_by = Auth::user()->id;

		$category->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' has been added to wallpapers.');

		return Redirect::to('admin/wallpapers');
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
		$Wallpaper = Wallpaper::findOrFail($id);
		$this->layout->content = View::make('wallpapers.edit')->with(compact('Wallpaper'));
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
			'title'      => 'required',
			'url'      => 'required|unique:wallpapers,url,' . $id,
			'size'      => 'required',
			'type'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/wallpapers/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$category = Wallpaper::findOrFail($id);
		$category->title = Input::get('title');
		$category->url = Input::get('url');
		$category->size = Input::get('size');
		$category->type = Input::get('type');
		$category->order = Input::get('order');
		$category->public = Input::get('public');
		$category->updated_by = Auth::user()->id;

		$category->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' Wallpaper has been updated.');

		return Redirect::to('admin/wallpapers');
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