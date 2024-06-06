<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function authenticate($username, $password) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		$username = strtolower($username);
		$db = db_connect();
        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
		
		if (password_verify($password, $rows['password'])) {
			$_SESSION['auth'] = 1;
			$_SESSION['username'] = ucwords($username);
			unset($_SESSION['failedAuth']);
			header('Location: /home');
			die;
		} else {
			if(isset($_SESSION['failedAuth'])) {
				$_SESSION['failedAuth'] ++; //increment
			} else {
				$_SESSION['failedAuth'] = 1;
			}
			header('Location: /login');
			die;
		}
    }

  //create user and insert into user table
  public function create_user ($username, $password) {
    $db = db_connect();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES ('$username', '$hash')");
    $statement->execute();
    header('Location: /login');
    die;
  }

  //check if username exists in user table
  public function check_user_exists ($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = '$username'");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    if (isset($rows['username'])) {
      return true;
    } else {
      return false;
    }

  }

}
