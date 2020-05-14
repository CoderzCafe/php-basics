
<?php

/**
 * put php variable to javascript
 * put javascript variable to php
 */


$data = "<script>document.writeln(one);</script>";
echo $data;

$newdata = "this is a php variable";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript">
        var one = "Hello WorldShine";

        var js_variable = "<?php echo $newdata; ?>";
        document.writeln(js_variable);
    </script>
</body>
</html>