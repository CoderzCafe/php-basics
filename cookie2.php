<?php


/**
 * 1.when to set the COOKIE?
 * => BY THE TIME YOU LOGGED IN...
 * 
 * 2. Where to set the COOKIE?
 * => in login.php file
 * where we match the password
 * if($password === $array['password']) {
 * //   here we set the cookie
 * } else {
 * }
 * 
 * 3. What kind of COOKIE.?
 * => first we should understand what kind cookie we or 
 * what kind of information we want to get
 * i) if the user logged in or not
 * ii) if the user logged in then what is the user 
 * identity?
 * 
 * 4. How to use the COOKIE? where to use cookie?
 * on the top of every page that is only available to
 * registered user who has logged in.
 * 
 * 
 * we need atleast two cookie
 * 1.one for recording user identity
 * 2. one for security verification
 * 
 * 
 */



?>