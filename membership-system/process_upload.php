<?php

## install the card scanner
if(isset($_COOKIE["id"]) && isset($_COOKIE["security"])) {
    $id = addslashes($_COOKIE["id"]);
    $sql = "SELECT * FROM `user` WHERE `user_id`='{$id}'";

    // require_once("./connect.php");
    include("./connect.php");
    $result = $db->query($sql);

    if($db->error) {
        exit("SQL ERROR");
    }

    if($result->num_rows === 0) {
        exit("Illegal operation.<a href='./log_in.php'>Return</a>");
    }

    ## id is real
    $array = $result->fetch_array();
    $result->free();
    $shell = md5($_COOKIE["id"].$array["user_password"]."one_plus_one_is_equal_three");
    // $db->close();

    if($shell === $_COOKIE["security"]) {
        echo "User name: {$array['user_name']}";
        echo "<hr>";
        echo "Welcome to the page........<a href='./logout.php'>Log out</a>";
        echo "<hr>";
    } else {
        exit("ERROR.!");
    }
}


if(empty($_COOKIE['switch'])) {
    exit("Upload request denied.<a href='./index.php'>Return</a>");
}

if($_COOKIE["switch"] == "on") {
    setcookie("switch", "", time()-1, "/");
} else {
    exit("Upload request denied.");
}

if(!empty($_POST["submit_button"])) {

    // var_dump($_FILES)

    // print_r($_FILES["uploadFile"]["type"]);

    // if($_FILES["upload_file"]["type"] == "image/jpg"
    //      || $_FILES["upload_file"]["type"] == "image/jpeg"
    //          || $_FILES["upload_file"]["type"] == "image/png") {
    //     echo "<b>Valid image<br></b>";
    //     uploadImage();
    // } else {
    //     echo "<b style='color:red'>This image format is not valid.<a href='./index.php'>Return</a></b>";
    // }
    
    switch ($_FILES["upload_file"]["type"]) {
        case "image/jpg":
            echo "<b>Valid image<br></b>";
            uploadImage();
            break;

        case "image/jpeg":
            echo "<b>Valid image<br></b>";
            uploadImage();
        break;

        case "image/png":
            echo "<b>Valid image.<br></b>";
            uploadImage();
        break;

        case "image/gif":
            echo "<b>Valid image.<br></b>";
            uploadImage();
        break;
        
        default:
            echo "<b style='color:red'>This image format is not valid.<a href='./index.php'>Return</a></b>";
            break;
    }
}

function uploadImage() {
    require_once("./connect.php");
    global $db;
    if($_FILES["upload_file"]["error"] == 0) {
        # file name control
        $result = explode(".", $_FILES["upload_file"]["name"]);
        $file_name_extension = array_pop($result) or end($result);
        $file_new_uploaded_name = time().rand(1000, 9999).".".$file_name_extension;

        ## make directory for the uploaded files
        $destination = "";
        $new_final_destination = "./".date("Y")."/".date("m")."/".date("d");

        if(!is_dir($new_final_destination)) {
            mkdir($new_final_destination, 0777, true);
            $destination = $new_final_destination."/".$file_new_uploaded_name;
        } else {
            ## directory already exists
            $destination = $new_final_destination."/".$file_new_uploaded_name;

        }

        if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $destination)) {
        

        $sql = "INSERT INTO `picture` SET `url`='{$destination}', `user_id`='{$_COOKIE['id']}'";
        $result = $db->query($sql);

        if($db->error) {
            exit("<b>SQL ERROR happend.!<a href='./index.php'>Return</a></b>");
        }
        $db->close();
            echo "<b style='color:yellowgreen;'>File uploaded successfully.<a href='./index.php'>Return</a></b>";
        } else {
            echo "<b>Failure</b>";
        } 
    } elseif($_FILES["upload_file"]["error"] == 2 || $_FILES["upload_file"]["error"]) {
        echo "<b>File size excceds.</b>";
    }
}

?>