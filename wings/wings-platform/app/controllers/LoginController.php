<?php

class LoginController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }


    public function getRegister()
    {
        // get European countries
        $countries = Country::where('Continent', '=', 'Europe')->orderBy('Country', 'asc')->lists('Country', 'ID');

        return View::make('login.register', array('countries' => $countries));
    }


    public function postCreate(){
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            // validation has passed, save user in DB
            $user = new User;
            $user->First_name = Input::get('First_name');
            $user->Last_name = Input::get('Last_name');
            $user->Email = Input::get('Email');
            $user->Password = Hash::make(Input::get('Password'));
            $user->Biography = Input::get('Biography');
            $user->Profession = Input::get('Profession');
            $user->Picture = Input::get('Picture');
            $user->LinkedIn = Input::get('LinkedIn');
            $user->Website = Input::get('Website');
            $user->Mentor = Input::get('Mentor');
            $user->Countries_ID = Input::get('Country');
            $user->User_Roles_ID = 2;
            $user->save();

            return Redirect::to('login/')->with('message', 'Thanks for registering!');
        } else {
            // validation has failed, display error messages
            return Redirect::to('login/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }


    public function getIndex() {
        return View::make('login.login');
    }


    public function postSignin() {
        /*if (Auth::attempt(array('email'=>Input::get('Email'), 'password'=>Input::get('Password')), true)) {
            return Redirect::to('users')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('login/')
                ->with('message', 'Your username/password combination was incorrect! ')
                ->withInput();
        }*/


        // validate the info, create rules for the inputs
        $rules = array(
            'Email'    => 'required|email', // make sure the email is an actual email
            'Password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login/')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('Password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'Email' 	=> Input::get('Email'),
                'Password' 	=> Input::get('Password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::to('users')->with('message', 'You are now logged in!');

            } else {

                // validation not successful, send back to form
                return Redirect::to('login')
                    ->with('message', 'Your username/password combination was incorrect! ')
                    ->withInput();

            }

        }
    }


    public function getDashboard() {
        return Redirect::to('users');
    }


    public function getLogout() {
        Auth::logout();
        return Redirect::to('login/')->with('message', 'Your are now logged out!');
    }
}
