<?php 
function logout() {
  echo "This is a test!";
  if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
    // Destroy the session data store
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_unset();
    session_destroy();
    $GLOBALS['msg'] = 'You have been logged out.';
    header("Location: index.html");
    exit();
  }
}
?>