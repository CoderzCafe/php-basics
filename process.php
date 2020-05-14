<?php

if(!empty($_POST["submit"])) {
    echo "User name: ".$_POST["userName"];
    echo "<br>";
    echo "Password: " .$_POST["password"];
}

if(!empty($_GET["submit"])) {
    echo "Link username: " .$_GET["userName"];
    echo "<br>";
    echo "Link password: " .$_GET["password"];
}



?>