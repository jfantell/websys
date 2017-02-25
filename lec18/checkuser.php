<?php 
function checkuser() {
   // Check login
     $dbconn = $GLOBALS['dbconn'];

     $salt_stmt = $dbconn->prepare('SELECT salt FROM users_auth WHERE username=:username');
     $salt_stmt->execute(array(':username' => $_POST['username']));
     $res = $salt_stmt->fetch();
     $salt = ($res) ? $res['salt'] : '';
     // $salted = sha1($salt . $_POST['pass']);
     $salted = hash('sha256', $salt . $_POST['pass']);
  
     
     $login_stmt = $dbconn->prepare('SELECT username, uid FROM users_auth WHERE username=:username AND pass=:pass');
     $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
     
     
     if ($user = $login_stmt->fetch()) {
       $_SESSION['username'] = $user['username'];
       $_SESSION['uid'] = $user['uid'];


       // check admin
       $is_admin = $dbconn->prepare('SELECT 1 FROM users_auth WHERE username=:username AND is_admin=1');
       $is_admin->execute(array(':username'=> $_SESSION['username']));

       if ($is_admin->fetch()) {
         $_SESSION['is_admin']=true;
       } else {
         $_SESSION['is_admin']=false;
       }

     } else {
       $_SESSION['err'] = 'Incorrect username or password.';
     }
}