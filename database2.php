<?php

### insert data 
 /**
  * create sql statement
  * execute sql statement
  * check for error
  */

  /** 
   * create sql statement
   * 1. the sql statement is a string, you should wrap it in double,
   * not single, quotes
   * 
   * 2. you need to assign the sql statement to a variable, you should
   * name that variable $sql
   * 
   * 3. all table names and field names should be wrapped in back 
   * quotes, not single quote
   * 
   * 4. all field values should be wrapped in single quoates, 
   * if the value is stored in a variable, wrap the variable with{},
   * then place it in single quotes
   * 
   * 5. all letters expect table name, field name, and field value
   * should be capitilized.
   * **************************************************************
   * 1. when you are inserting new data to the database, you
   *  will at least create a new row;
   * 
   * 2. you need to tell the system which table you want
   * 
   * 3. then, you need to have a legal value for each field,
   * expect the first field which is primary key
   * 
   * 4. by legal value, i mean the data type must be correct
   * for the selected field
   * 
   * 5. if the value is a string be careful with the length
   * 
   *  YOU MUST WRITE THE SQL INTO THAT FROM
   * __________________________________________
   * 
   * $sql = "INSERT INTO 'table_name' SET 'field_name1'='value1', 'field_name2'='{$value2}' ...;";
   * $sql = "INSERT INTO 'table' ('field_name1', 'field_name2')VALUES('value1', 'value2');";
   * 
   * $result = $db->query($sql);
   * 1. TRUE: if the insert is successful;
   * 2. FALSE: if the insert failed.
   * 3. should something went wrong, $db->error will
   *    tell you about it, Alternatively, you can use $db->errno.
   * 4. usually we use the form and input tags to collect the 
   * new data.
  */

  require_once("./connect_db.php");

  $date_time = date("Y-m-d H:i:s");
  // $date_time = time()
  echo $date_time;

  // $sql = "INSERT INTO `message_table` SET `users_name`='shahin', `post_time`='{$date_time}', `message_post`='Hello World'";
//   $sql = "INSERT INTO `message_table`('user_name', 'post_time', 'message') VALUES('shine', '{$date_time}', 'Hello world');";

  // $db->query($sql);

  // if($db->error) {
  //     echo $db->error;
  // } else {
  //     echo "Data submitted";
  // }

    ## insert data to db
    if(!empty($_POST["submit_button"])) {
      $sql = "INSERT INTO `message_table` SET `users_name`='{$_POST['userName']}', `post_time`='{$date_time}', `message_post`='{$_POST['userMessage']}'";

      $db->query($sql);

      if($db->error) {
        echo $db->error;
      } else {
        echo "Data submitted.";
      }
    }


?>


<form action="" method="POST">

<h3>User name: </h3> <input name="userName" type="text" value="">
<h3>Message: </h3> <textarea name="userMessage"></textarea>
<input name="submit_button" type="submit" value="Submit">

</form>