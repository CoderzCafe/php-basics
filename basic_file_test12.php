<?php


/**
 * how many visitors visit the page ***/

 $fileLoc = "./res/counter.txt";
if(file_exists("./res/counter.txt")) {
    $handle = fopen($fileLoc, "r");
    $counter = fread($handle, 128);
    fclose($handle);
    $counter++;
    echo "You are the ".$counter." visitors";
    $handle = fopen($fileLoc, "w");
    fwrite($handle, $counter);
    fclose($handle);
} else {
    echo "Welcome you are the first visitor";
    $handle = fopen($fileLoc, "w+");
    fwrite($handle, 1);
    fclose($handle);
}






?>