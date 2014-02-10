<?php

class PlaylistController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$playlists = Playlist::orderBy('order','asc')->get();
		$this->layout->content = View::make('playlists.index')->with(compact('playlists'));
	}

	public function index_public()
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', 'videos')->first();
		$playlists = Playlist::orderBy('order','asc')->get();

		// Input Meta info if set
		$this->layout->metaTitle = $page->meta_title;
		$this->layout->metaDesc = $page->meta_desc;

		$this->layout->content = View::make('playlists.public');
		$this->layout->content->playlists = $playlists;
	}

	public function create()
	{
		$this->layout->content = View::make('playlists.create');
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
			'title'      => 'required|unique:playlists',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/playlists/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$playlist = new Playlist;
		$playlist->title = Input::get('title');
		$playlist->order = Input::get('order');
		$playlist->created_by = Auth::user()->id;

		$playlist->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' playlist has been added.');

		return Redirect::to('admin/playlists');
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
		$playlist = Playlist::findOrFail($id);

		$this->layout->content = View::make('playlists.edit')->with(compact('playlist'));
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
			'title'      => 'required|unique:playlists,title,'.$id,
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('playlists/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		$playlist = Playlist::findOrFail($id);
		$playlist->title = Input::get('title');
		$playlist->order = Input::get('order');
		$playlist->updated_by = Auth::user()->id;

		$playlist->save();

		// redirect
		Session::flash('success_message', Input::get('title') . ' playlist has been updated.');

		return Redirect::to('admin/playlists');
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
		$plsylist = Playlist::findOrFail($id);
		$plsylist->delete();

		// redirect
		Session::flash('success_message', 'Playlist has been deleted.');
		return Redirect::to('admin/playlists');
	}

}