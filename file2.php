<?php

/**
 * this is all about how many
 *  times page is opend **/

 if(file_exists("./res/newcounter.txt")) {
     $handle = @fopen("./res/newcounter.txt", "r");
     $counter = fgets($handle);
     fclose($handle);
     $counter++;
     echo "You are the <h3>$counter</h3> Visitor";
     $handle = @fopen("./res/newcounter.txt", "w");
     fwrite($handle, $counter);
     fclose($handle);
 } else {
     echo "Welcome to the page <br> You are my first visitor.";
     $handle = @fopen("./res/newcounter.txt", "w");
     fwrite($handle, "1");
     fclose($handle);
 }



?>