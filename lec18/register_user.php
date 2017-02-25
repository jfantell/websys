<?php

function register_user() {

$dbconn = $GLOBALS['dbconn'];
    
    // @TODO: Check to see if duplicate usernames exist
    
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";



    if (!isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['passconfirm']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['passconfirm'])) {
      $msg = "Please fill in all form fields.";
    }
    else if ($_POST['pass'] !== $_POST['passconfirm']) {
      $msg = "Passwords must match.";
    }
    else {
      // Generate random salt
      $salt = hash('sha256', uniqid(mt_rand(), true));      

      // Apply salt before hashing
      $salted = hash('sha256', $salt . $_POST['pass']);


      
      $is_admin = ($_POST['isadmin'] == "true" ? true : false);

      // Store the salt with the password, so we can apply it again and check the result
      $stmt = $dbconn->prepare("INSERT INTO users_auth (username, pass, salt, is_admin) 
                          VALUES (:username, :pass, :salt, :isadmin)");
      $stmt->execute(array(':username' => $_POST['username'], 
                           ':pass' => $salted, 
                           ':salt' => $salt,
                           ':isadmin'=> $is_admin
                            ));
      $msg = "Account created.";
    }
    $GLOBALS['msg']=$msg;
}

