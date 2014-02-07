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

		// Setup the slug
		$slug = Request::path();
		if(Request::path() === '/') $slug = 'home';

		// Get Page info from DB if it exists
		$page = Page::where('slug', $slug)->first();

		// $page should never be null, but just in case
		if($page !== null)
		{
			// Input Meta info if set
			$this->layout->metaTitle = $page->meta_title;
			$this->layout->metaDesc = $page->meta_desc;
		
			// If view exists render view
			if(View::exists($page->slug))
				$this->layout->content = View::make($page->slug)->with('content', $page->content);
			// If DB content exists and a view does not, show content
			else
				$this->layout->content = View::make('empty')->with('content', $page->content);
		}
		else
		{
			return App::abort(404);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('pages.create');
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
			'meta_title'      	=> 'required',
			'slug'      	 	=> 'required|unique:pages',
			'order'      		=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/pages/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$page 					= new Page;
		$page->order 			= Input::get('order');
		$page->meta_title 		= Input::get('meta_title');
		$page->meta_desc 		= Input::get('meta_desc');
		$page->slug 			= Input::get('slug');
		$page->content 			= Input::get('content');

		$page->created_by 		= Auth::user()->id;

		$page->save();

		// redirect
		Session::flash('success_message', 'Page has been added.');

		return Redirect::to('admin/pages');
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
		$page = Page::findOrFail($id);

		$this->layout->content = View::make('pages.edit')->with(compact('page'));
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
			'meta_title'      	=> 'required',
			'slug'      	 	=> 'required|unique:pages,slug,' . $id,
			'order'      		=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			Session::flash('error_message', 'Validation error, please check all required fields.');
			return Redirect::to('admin/pages/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}

		// Store
		$page 					= Page::findOrFail($id);
		$page->order 			= Input::get('order');
		$page->meta_title 		= Input::get('meta_title');
		$page->meta_desc 		= Input::get('meta_desc');
		$page->slug 			= Input::get('slug');
		$page->content 			= Input::get('content');

		$page->updated_by 		= Auth::user()->id;

		$page->save();

		// redirect
		Session::flash('success_message', 'Page has been updated.');

		return Redirect::to('admin/pages');
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
		$page = Page::findOrFail($id);
		$page->delete();

		// redirect
		Session::flash('success_message', 'Page has been deleted.');
		return Redirect::to('admin/pages');
	}

}