<?php


if(isset($_COOKIE["id"]) && isset($_COOKIE["security"])) {
    $id = addslashes($_COOKIE["id"]);
    $sql = "SELECT * FROM `user` WHERE `user_id`='{$id}'";
    require_once("./connect.php");
    $result = $db->query($sql);
    if($db->error) {
        exit("SQL error.");
    }
    if($result->num_rows === 0) {
        exit("Illegal operation<a href='./log_in.php'>Return</a>");
    }

    ## id is real
    $array = $result->fetch_array();
    $result->free();
    $shell = md5($_COOKIE["id"].$array["user_password"]."one_plus_one_is_equal_three");
    
    $db->close();

    if($shell === $_COOKIE["security"]) {
        echo "User name: <b>{$array['user_name']}</b>";
        echo "<hr>";
        echo "<b>Welcome to homepage...<a href='./logout.php'>Logout</a></b>";
        echo "<hr>";
        echo "<br><b>Upload a file: </b><br><br>";
    } else {
        exit("Error.!");
    }
} else {
    exit("Please login first.<a href='./log_in.php'>");
}

setcookie("switch", "on", 0, "/");

// if(isset($_COOKIE["data_cookie"])) {
//     echo $_COOKIE["data_cookie"]['user_password'];
// }

?>

<form action="./process_upload.php" method="POST" enctype="multipart/form-data">
<input name="MAX_FILE_SIZE" type="hidden" value="300000">
<input name="upload_file" type="file" value="">
<input name="submit_button" type="submit" value="Submit file">
</form>