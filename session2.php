<?php


## start a session
session_start();

## assign a session
$_SESSION['userName'] = "Sudipto";
$_SESSION["password"] = "123456abc";

## delete a session completely
/**
 * 1.delete the value stored in SESSION
 * *** unset($_SESSION['name']);
 * *** multiple value to unset use array $_SESSION = array();
 * 
 * 2.delete the COOKIE that stores SESSION_ID
 * *** setcookie(session_name(), "", time()-1, '/')
 * using default name
 * *** setcookie(PHPSESSID, "", time()-1, '/');
 * 
 * 3.destroy the SESSION from the server completely
 * *** session_destroy();
 */


?>