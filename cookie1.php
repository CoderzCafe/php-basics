<?php

/**
 * COOKIE AND SESSION
 * 1. A HTTP cookie is a small piece of data sent from
 * a website and stored in a user's web browser while the
 * user is a browsing that website.
 * 
 * 2. Every time the user loads the website, the browser
 * sends the cookie back to server to notify the website of 
 * the user's previous activity.
 * 
 * 
 * In computer science, in particular networking, a session is
 * a semipermanent interactive information interchange, also 
 * known as a dialogue, a conversation or meeting, between two or
 * more communicating devices, or between a computer and user (see login
 * session)
 * 
 * In computer login session is the period of activity
 * between a user logging in and logging out of a(multiuser) system
 * 
 * COOKIE: less burden on the server no as safe as SESSION;
 * stored on the browser
 * 
 * SESSOION: more burden on the server safer than SESSION
 * stored on the server side
 * 
 * SETTING COOKIE
 * setcookie('cookie_name', 'cookie_value', duration, path);
 * duration=time()+time_period
 * 
 * * $path argument set the cookie for the path -> " / " -> set fo the entier domain
 * it will only available for the path that is set for the argument
 * 
 * If the time is not safe it will be destroyed when you close
 * the browser. it measures in seconds
 * 
 * DELETE A COOKIE
 * setcookie('cookie_name', '', time()-1);
 * 
 * * 
 */


 ## create cookie
//  var_dump($_COOKIE);
 setcookie("one", "one");
//  var_dump($_COOKIE["one"]);
 setcookie("two", "two", time()+3600, "/php-basics");
 var_dump($_COOKIE["two"]);

 ## delete a cookie
 setcookie("one", "", time()-1);


?>





















