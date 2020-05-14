<?php

# check if user has clicked the submit button.
# check if user has filled every form
# check wheather the two passwords are identical
# check e-mail address and password using regular expression
# email format: "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/";
# user name: "/^.{0, 50}$/"
# password: "/^.{6, 20}$/"
# security check: addslashes()/$db->escape_string()/$db->real_escape_string()
# check if the e-mail address has been used before
# encrypt passoword using md5()
# if everything is fine, insert into database.

if(!empty($_POST["submit_button"])) {
    if(empty($_POST["userName"]) || empty($_POST["password"]) || empty($_POST["retypePassword"])) {
        exit("Please fill all the forms<a href='./register.php'>Return</a>");
    }

    if($_POST["password"] !== $_POST["retypePassword"]) {
        exit("Please check your password again.<a href='./register.php'>Return</a>");
    }

    $pattern_email = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
    if(!preg_match($pattern_email, $_POST["email"])) {
        exit("Please use a valid email<a href='./register.php'>Return</a>");
    }
    // echo $_POST["password"];
    // if(!(strlen($_POST["password"] && strlen($_POST["password"])))) {
    //     exit("Passoword should contain atleast 6 to 20 characters only.<a href='./register.php'>Return</a>");
    // }

    // $pattern_password = "/^.{6, 20}$/";
    $pattern_password = "/^.{6,20}$/";
    if(!preg_match($pattern_password, $_POST["password"])) {
        exit("password should contain atleast 6 character<br>and maximum 10 character<a href='./register.php'>Return</a>");
    }

    $userName = addslashes($_POST["userName"]);
    $email = addslashes($_POST["email"]);
    $password = addslashes($_POST["password"]);

    ## check the email is unique or not
    require_once("./connect.php");
    $sql = "SELECT * FROM `user` WHERE `user_email`='{$email}'";
    $result = $db->query($sql);
    if($db->error) {
        exit("SQL error. <a href='./register.php'>Return</a>");
    }

    if($result->num_rows !== 0) {
        exit("Please use anoter database.<a href='./register.php'>Return</a>");
    }

    ## destroy new object insert data to the database
    $result->free();
    $password = md5($password);

    // $sql = "INSERT INTO `user` SET `user_name`='{$userName}, `email`='{$email}' ,`password`='{$password}'";
    $sql = "INSERT INTO `user` SET `user_name`='{$userName}', `user_email`='{$email}', `user_password`='{$password}'";
    $result = $db->query($sql);
    
    if($result === true) {
        echo "<h3>Registration successfully.</h3>";
    } else {
        echo "<h3>Registration failed.</h3>".$db->error;
    }

    $db->close();
}


?>

<form action="" method="POST">

User name: <input name="userName" type="text" value=""><br>
Email: <input name="email" type="email" value=""><br>
Password: <input name="password" type="password" value=""><br>
Reenter password<input name="retypePassword" type="password" value=""><br>
<input name="submit_button" type="submit" value="Submit"><br>

</form>