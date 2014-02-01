<?php

class PageController extends \BaseController {

	protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::orderBy('order','asc')->get();

		$this->layout->content = View::make('pages.index')->with(compact('pages'));
	}

	public function index_public()
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', Request::path())->first();

		if($page === null) return App::abort(404);

		// Input Meta info if set
		$this->layout->meta_title = $page->meta_title;
		$this->layout->meta_desc = $page->meta_desc;

		// If view exists render view
		if(View::exists($page->slug))
			$this->layout->content = View::make($page->slug)->with('content', $page->content);
		// If DB content exists show it
		elseif($page->content !== '')
			$this->layout->content = $page->content;
		// Else return 404 page
		else
			return App::abort(404);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
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