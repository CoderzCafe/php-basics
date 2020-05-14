<?php

$db = new mysqli("localhost", "root", "", "test_db1");

if($db->connect_error) {
    echo "<h3>Error in database.</h3>";
} else {
    echo "<h3>Connection established.</h3>";
}

?>