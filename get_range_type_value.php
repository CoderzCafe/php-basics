<?php

if(!empty($_POST["submitbutton"])) {
    $range = addslashes($_POST["rangetype"]);

    echo "<b>".$range."</b>";
}



?>

<form action="" method="POST">

    <label for="rangetype"><b>Range: </b></label>
    <input type="range" name="rangetype" value="2" min="1" max="10">
    <input type="submit" name="submitbutton" value="Print the range value">
</form>