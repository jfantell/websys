<?php

require 'install.php';
require 'config.php';
require 'connect.php';
require 'logout.php';
require 'checkuser.php';
require 'register_user.php';


session_start();
$_SESSION['err']='';

// Connect to the database
$dbname = 'lecture18';

dbconnect($config['DB_HOST'], $dbname, $config['DB_USERNAME'], $config['DB_PASSWORD']);

// var_dump($_SESSION);


// if login or logout are pressed

// $GLOBALS['msg']  = "checking session and post";

if (isset($_POST['login']) && $_POST['login']=='Login'){
  checkuser();
}

if (isset($_SESSION['username']) && isset($_SESSION['is_admin'])) {
  if ((isset($_POST['register'])&&$_POST['register']=='Register') && $_SESSION['is_admin']==true) {
    register_user();
  }
}

if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout']=='Logout') {
  logout();
}



?>
<!doctype html>
<html>
<style>
  .msg {
    color:green;
  }
  .err {
    color:red;
  }
</style>
<head>
  <title>Login</title>
</head>
<body>

  <?php if (isset($_SESSION['username'])): ?>

    <?php if($_SESSION['is_admin']==false) : ?>
      <h1>Welcome, <?php echo htmlentities($_SESSION['username']) ?></h1>

    <?php else: ?>
      <h1>User Registration</h1>
        <form method="post" action="index.php">
        <label for="username">Username: </label><input type="text" name="username" />
        <label for="pass">Password: </label><input type="password" name="pass" />
        <label for="passconfirm">Confirm: </label><input type="password" name="passconfirm" />
        <label for="setadmin">Admin?: </label><input type="radio" name="isadmin" value="true" />Yes
                                              <input type="radio" name="isadmin" value="false" />No
        <input type="submit" name="register" value="Register" />
      </form>
    <?php endif; ?>

  <?php else: ?>
    <h1>Login</h1>
    <form method="post" action="index.php">
      <label for="username">Username: </label><input type="text" name="username" />
      <label for="pass">Password: </label><input type="password" name="pass" />
      <input name="login" type="submit" value="Login" />
    </form>
  <?php endif; ?>


    <br/><br/>
    <form method="post" action="index.php">
      <input name="logout" type="submit" value="Logout" />
    </form>
    <?php if (isset($GLOBALS['msg'])) echo "<p class='msg'>" . $GLOBALS['msg'] . "</p>" ?>
    <?php if (isset($_SESSION['err'])) echo "<p class='err'>" . $_SESSION['err'] . "</p>" ?>
</body>
</html>
