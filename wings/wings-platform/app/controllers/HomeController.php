<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('pages.landing');
	}


    public function getAbout()
    {
        return View::make('pages.about');
    }


    public function getDiscover()
    {
        return View::make('pages.discover');
    }


    public function getLearn()
    {
        return View::make('pages.learn');
    }


    public function getSupport()
    {
        return View::make('pages.support');
    }
}
