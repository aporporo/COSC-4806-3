<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

  public function verify() {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    $user = $this->model('User');
    

    //check username exists in database
    if ($user->check_user_exists($username)) {
      $_SESSION['username_error'] = 1;
      header ('location: /create');
    //check passwords match
    } else if ($password != $password2) {
      $_SESSION['password_match_error'] = 1;
      header ('location: /create');
    //check password length
    } else if (strlen($password) < 8) {
      $_SESSION['password_length_error'] = 1;
      header ('location: /create');
    }
    //if all checks pass, create user
    else {
      $user->create_user($username, $password);
      header ('location: /login');
    }
  }
}
