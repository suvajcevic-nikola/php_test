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
            /*uspesna validacija, proveravamo postojece korisnike
            i ukoliko nema poklapanja username ili email, upisujemo novog korisnika u bazu*/
            $user = new User($username, $password, $email);
            $result = $user->userCheck($username, $email);
            $nr = $result->num_rows;

            if($nr != 0)
            {
                echo "Username or email is already taken, choose another";
            }
            else
            {
                $user->registerUser();

                header('Location: login.php');
            }
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
