<?php

$handle = @opendir("./destination");

var_dump(readdir($handle));
var_dump(readdir($handle));
var_dump(readdir($handle));
// var_dump(unlink("./destination/15854951106110png"));

?>