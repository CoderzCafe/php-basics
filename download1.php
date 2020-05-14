<?php

## to download a file
/**
 * -> header('Content-type:application/octet-stream')
 *    to tell the browser to download the file, not to open
 *    open the file directly
 * -> header('Accept-Ranges:bytes')
 *    what partial content range types this server support
 * -> header('Accept-Length:'.filesize($file_path));
 *    the size of the file to be downloaded
 * -> header('Content-Disposition:attachment; filename='.$file_name)
 *    the name you want to downloded file to save
 * 
 * $handle = fopen($filepath, 'r');
 * while(!feof($handle)){
 * echo fread($handle, 1024);
 * }
 * fclose($handle) ***/

 /**
 * GET METHOD
 * 1. when sending values using the $_GET method, always
 *    remember: everyone can see what you have sent;
 * 2. everyone can also change what you sent using
 *    $_GET;
 * 3. Never trust values send by the GET method;
 * 4. Always compare the value send by the GET method
 *    against an acceptable value range before using 
 *    that value.
 */

 if(!empty($_GET["pic_name"])) {

    $acceptable_range = array(
        // "p1.jpg",
        "p2.jpg",
        "p3.png",
        "p4.jpg",
        "p5.jpg",
        "p6.jpg",
        "p7.jpg"
    );

    $result = in_array($_GET["pic_name"], $acceptable_range, true);
    if(!$result) {
        exit("<h3>Police is on the way.</h3>");
    } else {
        /**
     * 1. controls which file will be downloded.
     * 2. therefore, its value must be filtered and limited. **/
     $filepath = "./destination/".$_GET["pic_name"];
     header("Content-type:application/octet-stream");
     header("Accept-Ranges: bytes");
     header("Accept-Length: ".filesize($filepath));
     header("Content-Disposition:attachment; filename=" .$_GET["pic_name"]);

    $handle = fopen($filepath, "r");
    while(!feof($handle)) {
        echo fread($handle, 1024);
    }
    fclose($handle); 
    }
 }



?>

<a href="download1.php?pic_name=p1.jpg"><img src="./destination/p1.jpg" width="250" height="200"></a>
<a href="download1.php?pic_name=p3.png"><img src="./destination/p3.png" height="250" height="200"></a>
