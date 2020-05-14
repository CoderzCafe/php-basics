<?php

### upload file security
/**
 * uploded file must be pass the security check.
 * uploaded file must be stored in orderd.
 * uploaded file must be renamed properly.
 */

 ## control file size
 /**
  * 1. server side
  * 2. browser side

  * $_FILES['upload']['error']
  * 0 -> upload successfully
  * 1 -> filesize > upload_max_file in php.ini
  * 2 -> filesize > MAX_FILE_SIZE in html input
  * 3 -> partly uploaded
  */


?>


<form action="./process_upload2.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
    <input type="file" name="uploadFile" value="">
    <input type="submit" name="submit" value="Submit">
</form>