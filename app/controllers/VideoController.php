<?php

class VideoController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos = Video::orderBy('playlist_id','desc')->orderBy('order','asc')->get();

		$this->layout->content = View::make('videos.index')->with(compact('videos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$playlists = ['' => 'Select a Playlist'] + Playlist::orderBy('order','desc')->lists('title', 'id');

		$this->layout->content = View::make('videos.create')->with(compact('playlists'));
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
			'url'      	 => 'required|unique:videos',
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation Error');
			return Redirect::to('admin/videos/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$video = new Video;
		$video->title = Input::get('title');
		$video->url = Input::get('url');
		$video->order = Input::get('order');
		$video->public = Input::get('public');

		$video->playlist_id = Input::get('playlist_id');

		$video->save();

		// redirect
		Session::flash('success_message', 'Video has been aded.');

		return Redirect::to('admin/videos');
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
		$video = Video::findOrFail($id);

		$playlists = ['' => 'Select a Playlist'] + Playlist::orderBy('order','desc')->lists('title', 'id');

		$this->layout->content = View::make('videos.edit')->with(compact(['video','playlists']));
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
			'url'      	 => 'required|unique:videos,url,'.$id,
			'order'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation Error');
			return Redirect::to('admin/videos/'. $id .'/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$video = Video::findOrFail($id);
		$video->title = Input::get('title');
		$video->url = Input::get('url');
		$video->order = Input::get('order');
		$video->public = Input::get('public');

		$video->playlist_id = Input::get('playlist_id');

		$video->save();

		// redirect
		Session::flash('success_message', 'Video updated.');

		return Redirect::to('admin/videos');
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