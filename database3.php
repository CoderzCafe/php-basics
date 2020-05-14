<?php

## SQL INJECTION
/**
 * when submitting values, user can use special character to 
 * trick system into executing their own sql statement
 * 
 * never trust user-submitted data and escap every special characters.
 * use regular expression to limit the acceptable data value and type
 * 
 * 1. $db->real_escape_string();
 * 2. $db->escape_string();
 * 3. addslashes();
 * 
 * 1. every time you have inserted anew row into the database, a new
 * if will be generated automativally.
 * 2. in the future, when you are dealing with two or more tables simutaneously,
 * you might often need to insert that id into tables as foreign key.
 * 
 * $db->insert_id();
 */

 require_once("./connect_db.php");

 $date_time = date("Y-m-d H:i:s");
  // $date_time = time()
  echo $date_time;
 
 if(!empty($_POST['submit_button'])) {
    $_POST["userName"] = addslashes($_POST["userName"]);
    $_POST["userMessage"] = addslashes($_POST["userMessage"]);

    $sql = "INSERT INTO `message_table` SET `users_name`='{$_POST['userName']}', `post_time`='{$date_time}', `message_post`='{$_POST['userMessage']}'";

    $db->query($sql);

    if($db->error) {
        echo $db->error;
    } else {
        echo "Data submitted.";
        echo "The new row id: ".$db->insert_id;
    }
 }
 


?>

<form action="" method="POST">

<h3>User name: </h3> <input name="userName" type="text" value="">
<h3>Message: </h3> <textarea name="userMessage"></textarea>
<input name="submit_button" type="submit" value="Submit">

</form>