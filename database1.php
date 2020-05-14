<?php

/**
 * method1: 
 * $db = new mysqli('localhost', 'root', 'psw', 'db_name');
 * 
 * method2:
 * $db = new mysqli();
 * $db->connect('localhost', 'root', 'psw', 'db_name');
 * 
 * DETECT CONNECTION ERROR
 * $db->connect_error ==> returns a string description of the last connect error
 * $db->connect_errno ==> returns the error code from last connect call
 * 
 * BLOCK THE ERROR CODE
 * $db = @new mysqli('localhost', 'root', 'psw', 'db_name');
 * 
 * MUST CLOSE THE CONNECTION AFTHER DOING WORK
 * $db->close();
 * 
 */

 ## instansiate the mysqli 
 ## creating connection
 $db = new mysqli("localhost", "root", "", "test_db1-dbs");

 if($db->connect_errno) {
     echo "<h3>The connection shows error.</h3>";
 } else {
    echo "<h3>Connection established.</h3>";
 }



?>