<?php

function super_delete($dir) {
    $handle = @opendir($dir) or die("Can not be open $dir");
    readdir($handle);
    readdir($handle);
    while(false !== ($file = readdir($handle))) {
        $file = $dir ."/".$file;
        if(is_dir($file)) {
            super_delete($file);
        } else {
            if(@unlink($file)) {
                echo "file: $file has been successfully deleted.<br>";
            } else {
                echo "file: $file can not be deleted.<br>";
            }
        }
    }

    if(@rmdir($dir)) {
        echo "directory: $dir has been successfully deleted.<br>";
    } else {
        echo "directory: $dir can not be deleted.<br>";
    }
    closedir($handle);
}


?>