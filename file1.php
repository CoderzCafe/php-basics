<?php

/**
 * fileName -> full path of the file
 * fopen('fileName', 'mode') -> open or create a file
 * 
 * 
 * fwrite() -> write in the file
 * fread() -> read file
 */


 /***
  * 'r' ->	Open for reading only; place the file pointer at the beginning of the file.
    'r+' -> Open for reading and writing; place the file pointer at the beginning of the file.
    'w' -> Open for writing only; place the file pointer at the beginning of the file and truncate the file to zero length. If the file does not exist, attempt to create it.
    'w+' -> Open for reading and writing; place the file pointer at the beginning of the file and truncate the file to zero length. If the file does not exist, attempt to create it.

    'a' ->	Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() has no effect, writes are always appended.
    'a+' -> Open for reading and writing; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() only affects the reading position, writes are always appended.
  */

  // open a file and create it
    $handle = fopen("./res/hello.txt", "a+");
      
    $content = "Hello this is shine";
    fwrite($handle, $content);
    fclose($handle);

  $handle = @fopen("./res/hello.txt", "r") or die("There is no file on this location.");
  ## get data from the file
  $content = "";
  while(!feof($handle)) {
      $content .= fread($handle, 1024);
  }
  fclose($handle);
  echo $content;





?>