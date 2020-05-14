<?php


## delete the session
session_start();

unset($_SESSION["userName"]);
unset($_SESSION["password"]);
# OR
$_SESSION = array();


## delete session from the cookie
setcookie(session_name(), "", time()-1, "/");

## destroy the session
session_destroy();

echo "<b>Just refresh it and <a href='./show.php'>Return</a></b>"



?>