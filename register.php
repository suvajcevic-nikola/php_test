<?php

require_once 'user.php';

//validacija forme

$usernameErr = $emailErr = $passwordErr = $repasswordErr = "*";

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    if (empty($username)) {
        $usernameErr = "Enter username";
    }
    if (empty($email)) {
        $emailErr = "Enter email";
    }
    if (empty($password)) {
        $passwordErr = "Enter password";
    }
    if (empty($repassword)) {
        $repasswordErr = "Repeat password";
    }
    if ($usernameErr=="*" and $emailErr=="*" and $passwordErr == "*" and $repasswordErr == "*")
    {
        //provera poklapanja sifara
        if($password != $repassword)
        {
            $passwordErr = $passwordErr . "You must enter same password";
            $repasswordErr = $repasswordErr . "You must enter same password";
        }
        else
        {
            //uspesna validacija, upisujemo korisnika u bazu
        }
    }

}

?>


<html>
<head>

</head>
<body>
<form action="register.php" method="POST">
    Username:
    <input type="text" name="username">
    <br><br>
    Email:
    <input type="text" name="email">
    <br><br>
    Password:
    <input type="password" name="password">
    <br><br>
    Repeat password:
    <input type="password" name="repassword">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>

</html>
