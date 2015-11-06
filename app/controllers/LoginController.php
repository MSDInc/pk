<?php

// Controller for login, logout and related tasks
class LoginController extends BaseController {

	public function showLogin() {
    // If the user is already authenticated, redirect to home
    if (Auth::check())
      return Redirect::to('/');
    // Otherwise return the login view
		return View::make('login');
	}

  public function doLogin() {
    // If the user is already authenticated, redirect to home
    if (Auth::check())
      return Redirect::to('/');
    // Otherwise, validate the data and perform login
    $email = Input::get('email'); $passwd = Input::get('password');
    if (Auth::attempt(array('email'=>$email,'password'=>$passwd))) {
      return Redirect::intended('/');
    } else {
      return Redirect::to('login')->withMessages(array(array('error',
        '<strong>Username</strong> and/or <strong>password</strong>
        incorrect.')));
    }
  }

  public function doLogout() {
      if (Auth::check()) {
          $really = Input::get('really');
          if ($really=='yes')
              Auth::logout();
      }
      return Redirect::to('/');
  }
}
