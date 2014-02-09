<?php

class BaseController extends Controller {

	public function __construct()
    {
        // Build our navigation
        $browser = BrowserDetect::getInfo();
        View::share('browser', $browser->data);

        $categories = QuestionCategory::orderBy('order','asc')->get(['title','slug']);
   		View::share('global_categories', $categories);
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}