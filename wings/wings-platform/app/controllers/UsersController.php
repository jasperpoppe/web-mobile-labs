<?php

class UsersController extends BaseController {

    public function getIndex()
    {
        // check if user is logged in
        if(!Auth::check()){
            return Redirect::to('login/login');
        }

        // get user
        $user = Auth::user();

        return View::make('users.index', array('user' => $user));
    }
}