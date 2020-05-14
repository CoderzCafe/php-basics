<?php

/**
 * create SQL statement
 * Escape SQL statement
 * Execute SQL statement
 * check for errors
 * 
 * 1. you want to switch thr old field value with a new value, you do
 * not care about the old field value
 * 
 * $sql = "UPDATE `table` SET `field1`='new_value' WHERE ... LIMIT 1";
 * 
 * 2. you want to adjust the old field value, for exeample, you want the
 * old field value to increase by 10 or decrease by 5.
 * $sql = "UPDATE `tableName` SET `field1`=`field1`+10 WHERE ...LIMIT 1";
 * 
 * use limit is necessary
 * 
 * $sql = "UPDATE `tableName` SET `field1`=`field1`+10 WHERE ...LIMIT 1";
 * $sql = "DELETE FROM `table_name` WHERE ... LIMIT 1;";
 * 
 * $db->query($sql);
 * 1. TRUE OR FALSE
 * 2. $db->error tells error details
 * 3. INSERT: $db->insert_id;
 * 4. UPDATE and DELETE: $db->affected_row;
 * after you have update and delete a table, you need to know
 * how many rows have been updated or deleted.
 * 5. INSERT and DELETE operate at row level;
 * 6. UPDATE Operates at field-level
 * 
 */

 ## conenct with database
 $db = new mysqli("localhost", "root", "", "car");

 if($db->error) {
    echo "Error to connect database." .$db->error;
 } else {
     echo "Connection established.";
 }

 ## update the table
//  $sql = "UPDATE `cars_detail` SET `gearbox`='MT' WHERE `gearbox`='manual'";

//  $db->query($sql);

//  if($db->error) {
//      echo "Update failed<br>";
//  } else {
//      echo "Update successfully.";
//      echo $db->affected_rows." rows have been updated.";
//  }
 
## delete the table
$sql = "DELETE FROM `cars_detail` WHERE `brand`='TOYOTA' LIMIT 1";
$db->query($sql);

 if($db->error) {
     echo "Delete failed<br>";
 } else {
     echo "Delete successfully.";
     echo $db->affected_rows." rows have been deleted.";
 }

 $db->close();



?>