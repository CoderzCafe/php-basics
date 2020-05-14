<?php


/**
 * set an expire date to a session
 * session_set_cookie_params()
 * 1. before session_start()
 * 2. every time you request SESSION
 * 3.no need to use time()
 */
session_set_cookie_params(3);
$result = session_start();

if($result) {
    echo "A new session is started.";
} else {
    echo "Error.";
}

$_SESSION["first_name"] = "Sudipto";
$_SESSION["last_name"] = "Shahin";

echo "<a href='./show.php'>To show the session.</a>";


?>