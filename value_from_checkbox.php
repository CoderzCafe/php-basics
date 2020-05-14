
<?php

if(!empty($_POST["submit"])) {
    $value = $_POST["chk"];
    echo $value;
}

?>



<form action='' method='post'>
<input type='checkbox' name='chk' value='value1'> ANY VALUE 1 <br>
<input type='checkbox' name='chk' value='value2'> ANY VALUE 2 <br>
<input type='checkbox' name='chk' value='value3'> ANY VALUE 3 <br>
<input type='checkbox' name='chk' value='value4'> ANY VALUE 4 <br>
<input type='submit' name='submit' value='Get Value'>
</form>