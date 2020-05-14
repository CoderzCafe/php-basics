<?php

// if(isset($_COOKIE['id']) && isset($_COOKIE["security"])) {
//     setcookie("id", "", time()-1, "/");
//     setcookie("security", "", time()-1, "/");
//     echo "You are logging out! <a href='./log_in.php'>Log in</a>";
// } else {
//     exit("Please log in first.<a href='./log_in.php'>Login</a>");
// }

// if(isset($_SESSION["userId"]) && isset($_SESSION["userPassword"])) {
//     $_SESSION = $array();
//     setcookie(session_name(), "", time()-1, "/");
//     session_destroy();
// }

session_start();

if(isset($_SESSION["user_name"]) && isset($_SESSION["password"]) {
    $_SESSION = array();
    setcookie(session_name(), "", time()-1, "/");
    session_destroy();
    echo "<b>You are loggin out..<a href='./admin_login'>Login</a></b>";
} else {
    echo "<b>Please login.</b>";
}



?>