<?php

class PostController extends \BaseController {

	protected $layout = 'layouts.admin';
	protected $browser;

	function __construct()
	{
		$browser = BrowserDetect::getInfo();
    	$this->browser = $browser->data;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = Post::count();
		$posts = Post::take(15)->orderBy('posted_at','desc')->get(['fb_id','posted_at']);

		$this->layout->content = View::make('posts.index')->with(compact('count','posts'));
	}

	public function index_public()
	{
		// Set the master public Layout
		$this->layout = View::make('layouts.master');

		// Get Page info from DB if it exists
		$page = Page::where('slug', Request::path())->first();
		$posts = Post::orderBy('posted_at','desc')->paginate(15);

		// Input Meta info if set
		$this->layout->meta_title = $page->meta_title;
		$this->layout->meta_desc = $page->meta_desc;

		$this->layout->content = View::make('posts.public');
		$this->layout->content->posts = $posts;
		$this->layout->content->browser = $this->browser;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$before = Post::count();

		// Sync local db with Facebook posts.
		$post = new Post;
		$post->download_posts();

		$after = Post::count();

		$total = $before - $after;

		// redirect
		Session::flash('success_message', 'Facebook Sync complete, ' . $total . ' news posts added.');
		return Redirect::to('admin/posts');
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