<?php

class AdminController extends BaseController {

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
		return View::make('admin.index');
	}


    public function getGood_practices(){
        $good_practices = GoodPractice::all();

        return View::make('admin.good_practices', array('good_practices' => $good_practices));
    }


    public function getNew_good_practices(){
        return View::make('admin.new_good_practices');
    }


    public function getEdit_good_practices(){
        return View::make('admin.edit_good_practices');
    }


    public function getDelete_good_practices(){
        return View::make('admin.delete_good_practices');
    }
}