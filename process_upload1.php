<?php

# GLOBAL ARRAY $_FILES
/**
 * 1. after you have uploaded a file, yhr file will first 
 * be stored in a temporary file folder and eill br given
 * temporary name
 * 
 * 2. PHP will then acquire a global multidimensional
 * array $_FILES.
 * 
 * 3. The array key will be the name you picked for 
 * the input tag
 * 
 * GLOABL ARRAY -> $_FILES["upload"]["..."]
 * 
 * 1. $_FILES['upload']['name'] => the original name of the file
 * 2. $_FILES['upload']['type'] => the file type of the uploaded file
 * 3. $_FILES['upload']['size'] => the size of the already uploaded 
 *    part of the file
 * 4. $_FILES['upload']['tmp_name'] => the temporary file name used at
 *    the server side
 * 5. $_FILES['upload']['error'] returns 0 or 1 => 0 means no error **/


 if(!empty($_POST["submit"])) {
    if($_FILES["uploadFile"]["error"] == 0) {
        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "./destination/".$_FILES["uploadFile"]["name"])) {
            echo "<h4>File uploaded successfully</h4>";
        } else {
            echo "<h4>Error happend.!</h4>";
        }
    }
 }


?>