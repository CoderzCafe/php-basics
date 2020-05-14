<?php


$db = new mysqli("localhost", "root", "", "membership-system");

if($db->error) {
} else {
    echo "Could connect to the database.<br>". $db->error;
    echo "Connection is made.";
}


?>