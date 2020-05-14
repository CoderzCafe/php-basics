<?php

/**
 * session_start()
 * there is no output operation will happend
 * before the session_start()
 * 
 * when we start a session
 * it will assigned with a -> SESSION_ID
 * which is STORED in a COOKIE named PHPSESSID
 * 
 */

 ## start a session
 $result = session_start();

 if($result) {
     echo "Session started successfully.";
 } else {
     echo "Error.!";
 }

 var_dump($_COOKIE);
 echo "<br>";
 var_dump(session_id());
 echo "<br>";
 var_dump(session_name());

 ## declare a session
 $_SESSION["userName"] = "Sudipto Shahin";
 $_SESSION["password"] = "123456abc";

 var_dump($_SESSION["userName"]);
 var_dump($_SESSION["password"]);

 $_SESSION = array();
 setcookie(session_name(), "", time()-1, "/");
 session_destroy();



?>