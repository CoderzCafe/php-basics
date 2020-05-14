<?php

/**
 * we assume the log in name/email exists,
 * then we use it as the condition to search for 
 * password from the database.
 *  
 * $email = addslashes($_POST['email'])
 * $sql = "SELECT * FROM `table_name` WHERE `email`='{$email}'";
 * 
 * require_once("./connect.php");
 * $result = $db->query($sql);
 * 
 * if($result == false) {
 *  exit('sql error');
 * }
 * 
 * $result->num_rows === 0 or 1?
 * $result->num_rows === 0  this means the log in
 * name or email address does not exists
 * 
 * $result->num_rows === 1, then we compare the 
 * submitted password with the recorded password from the database
 * 
 * when we match the submitted_password to db_password it will
 * not match because db_pwd is encrypted so first we should encrypt
 * the password by using md5() then compare it.
 * $array = $result->fetch_array();
 * 
 */

if(!empty($_POST["submit_button"])) {

    if(empty($_POST["userEmail"]) || empty($_POST["userPassword"])) {
        exit("<b>Please fill all the form.</b><a href='./admin_login.php'>Return</a>");
    }

    ### collect the user data
    $email = addslashes($_POST["userEmail"]);
    $password = addslashes($_POST["userPassword"]);

    ## made connection to database
    require_once("./connect.php");

    $sql = "SELECT * FROM `user` WHERE `user_email`='{$email}'";
    $result = $db->query($sql);

    if($db->error) {
        exit("<b>SQL error</b><a href='./admin_login.php'></a>");
    }

    if($result->num_rows === 0) {
        exit("<b>Account does not exist.</b><a href='./admin_login.php'>Return</a>");
    }

    ## compare the password
    $password = md5($password);
    $array = $result->fetch_array();
    $result->free();
    $db->close();

    if($password === $array["user_password"]) {
        ## create cookie
        // setcookie("id", $array["user_id"], 0, "/");
        // $security = md5($array["user_id"].$array["user_password"]."one_plus_one_is_equal_three");
        // setcookie("security", $security, 0, "/");
        session_start();
        $_SESSION["user_name"] = $array["user_name"];
        $_SESSION["password"] = $array["user_password"];

        echo "<script>window.location.href='./admin_index.php'</script>";
    } else {
        exit("<b>Wrong password.!.</b><a href='./admin_login.php'></a>");
    }
}


?>

<form action="" method="POST">
    Email: <input name="userEmail" type="text" value="">
    Password: <input name="userPassword" type="password" value="">
    <input name="submit_button" type="submit" value="Submit">
</form>