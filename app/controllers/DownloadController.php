<?php

class DownloadController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$files = Download::orderBy('order','desc')->get();
		$this->layout->content = View::make('downloads.index')->with(compact('files'));
	}

	public function index_public()
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', 'downloads')->first();

		$files = Download::orderBy('order','desc')->get();
		$images = Wallpaper::orderBy('order','desc')->get();

		// Input Meta info if set
		$this->layout->metaTitle = $page->meta_title;
		$this->layout->metaDesc = $page->meta_desc;

		$this->layout->content = View::make('downloads.public');
		$this->layout->content->files = $files;
		$this->layout->content->images = $images;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('downloads.create');
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
			'url'      => 'required|unique:downloads',
			'size'      => 'required',
			'type'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/downloads/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$category = new Download;
		$category->title = Input::get('title');
		$category->url = Input::get('url');
		$category->size = Input::get('size');
		$category->type = Input::get('type');
		$category->order = Input::get('order');
		$category->public = Input::get('public');
		$category->created_by = Auth::user()->id;

		$category->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' has been added to Downloads.');

		return Redirect::to('admin/downloads');
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
		$download = Download::findOrFail($id);
		$this->layout->content = View::make('downloads.edit')->with(compact('download'));
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
			'url'      => 'required|unique:downloads,url,' . $id,
			'size'      => 'required',
			'type'      => 'required',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/downloads/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$category = Download::findOrFail($id);
		$category->title = Input::get('title');
		$category->url = Input::get('url');
		$category->size = Input::get('size');
		$category->type = Input::get('type');
		$category->order = Input::get('order');
		$category->public = Input::get('public');
		$category->updated_by = Auth::user()->id;

		$category->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' Download has been updated.');

		return Redirect::to('admin/downloads');
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
		$album = Download::findOrFail($id);
		$album->delete();

		// redirect
		Session::flash('success_message', 'Download has been deleted.');
		return Redirect::to('admin/downloads');
	}

}