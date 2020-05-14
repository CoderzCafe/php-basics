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

if(!empty($_POST["submit"])) {

    ### file type control
    switch($_FILES["uploadFile"]["type"]) {
        case "image/jpg":
            echo "Valid image";
            upload_image();
        break;
        case "image/png":
            echo "Valid image";
            upload_image();
        break;
        case "image/jpeg":
            echo "Valid image";
            upload_image();
        break;
        default:
            echo "<h3>This image formate is not validate.</h3>";
        break;
    }

    // if($_FILES['uploadFile']["error"] == 0)  {
    //     if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "./destination/".$_FILES["uploadFile"]["name"])) {
    //         echo "File Uploaded..";
    //     } else {
    //         echo "Failure.";
    //     }
    // } elseif($_FILES['uploadFile']["error"] == 2 || $_FILES['uploadFile']["error"] == 3) {
    //     echo "file size excceds";
    // }
}


function upload_image() {
    ## file size control
    if($_FILES['uploadFile']["error"] == 0)  {
        ## file name control
        $result = explode(".", $_FILES["uploadFile"]["name"]);
        $file_name_extension = array_pop($result) or end($result);
        $file_new_uploaded_name = time().rand(1000, 9999).".".$file_name_extension;

        //  make new directory
        $destination = "";
        $new_final_destination = "./".date("Y"). "/" .date("m"). "/". date("d");
        if(!is_dir($new_final_destination)) {
            mkdir($new_final_destination, 0777, true);
            $destination = $new_final_destination."/".$file_new_uploaded_name;
        } else {
            //  directories already exists
            
        }

        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $destination)) {
            echo "File Uploaded..";
        } else {
            echo "Failure.";
        }
    } elseif($_FILES['uploadFile']["error"] == 2 || $_FILES['uploadFile']["error"] == 3) {
        echo "file size excceds";
    }
}


?>