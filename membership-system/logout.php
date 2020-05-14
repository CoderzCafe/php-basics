<?php

if(isset($_COOKIE['id']) && isset($_COOKIE["security"])) {
    setcookie("id", "", time()-1, "/");
    setcookie("security", "", time()-1, "/");
    echo "You are logging out! <a href='./log_in.php'>Log in</a>";
} else {
    exit("Please log in first.<a href='./log_in.php'>Login</a>");
}



?>