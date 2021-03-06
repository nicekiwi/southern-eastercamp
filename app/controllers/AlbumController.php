<?php

class AlbumController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = Album::orderBy('year','desc')->get();
		$this->layout->content = View::make('albums.index')->with(compact('albums'));
	}

	public function index_public($year = null)
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', 'photos')->first();

		// Get Album info
		if($year === null)
			$album = Album::orderBy('year', 'desc')->first();
		else
			$album = Album::where('year', $year)->first();

		if($album === null)
			return App::abort(404);

		$photos = Photo::where('album_id',$album->id)->paginate(150);

		// Input Meta info if set
		$this->layout->metaTitle = $page->meta_title;
		$this->layout->metaDesc = $page->meta_desc;

		$this->layout->content = View::make('albums.public');
		$this->layout->content->photos = $photos;
		$this->layout->content->album = $album;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Create array of existing fb-ids
		$albumClass = new Album;
		$fb_albums = $albumClass->get_fb_albums();

		$existing = [];

		// filter albums so only un-used albums show up
		foreach (Album::get() as $list) {
			foreach (json_decode($list->albums) as $id) {
				array_push($existing, $id);
			}
		}

		$this->layout->content = View::make('albums.create')->with(compact('fb_albums','existing'));
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
			'year'       		=> 'required|unique:albums',
			'fb_album_ids'      => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/albums/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$album = new Album;
		$album->year = Input::get('year');
		$album->albums = json_encode(Input::get('fb_album_ids'));

		$album->save();

		$album_id = $album->id;

		$fb_albums_ids = Input::get('fb_album_ids');

		$photo_count = 0;

		foreach ($fb_albums_ids as $fb_album_id) {

			$albumClass = new Album;
			$fb_photos = $albumClass->get_fb_photos($fb_album_id);

			$photo_count += count($fb_photos);

			foreach ($fb_photos as $fb_photo) {

				$photo = new Photo;
				$photo->album_id 	= $album_id;
				$photo->fb_album_id = $fb_album_id;
				$photo->fb_photo_id = $fb_photo['id'];
				$photo->width 		= $fb_photo['width'];
				$photo->height 		= $fb_photo['height'];

				$post = new Post;
				$photo->picture 	= $post->makePicture($fb_photo['picture']);

				$photo->save();
			}
		}

		$album = Album::find($album_id);
		$album->count = $photo_count;
		$album->created_by = Auth::user()->id;

		$album->save();

		// redirect
		Session::flash('success_message', 'Eastercamp' . Input::get('year') . ' Photo Album has been created.');

		return Redirect::to('admin/albums');
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
		// delete
		$album = Album::findOrFail($id);
		$album->delete();

		// redirect
		Session::flash('success_message', 'Album has been deleted.');
		return Redirect::to('admin/albums');
	}

}