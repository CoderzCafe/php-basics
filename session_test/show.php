<?php


## start the session 
session_set_cookie_params(3);
session_start();

var_dump($_SESSION);
echo "<hr>";
echo "<br>";
var_dump($_COOKIE);

echo "<a href='./start.php'>Start the session again</a>";


?>