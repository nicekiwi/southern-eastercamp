<?php

class PostController extends \BaseController {

	protected $layout = 'layouts.admin';

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
		$posts = Post::orderBy('posted_at','desc')->paginate(15);

		return View::make('posts.public')->with(compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Sync local db with Facebook posts.
		$post = new Post;
		$post->download_posts();

		// redirect
		Session::flash('success_message', 'Facebook Posts have been synced.');
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