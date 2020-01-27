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
            $passwordErr = "You must enter same password";
            $repasswordErr = "You must enter same password";
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <form action="register.php" method="POST">
            <h3>Register</h3>
            Username:
            <input type="text" name="username" class="form-control">
            <span class="error"> <?php echo $usernameErr; ?> </span>
            <br>
            Email:
            <input type="text" name="email" class="form-control">
            <span class="error"> <?php echo $emailErr; ?> </span>
            <br>
            Password:
            <input type="password" name="password" class="form-control">
            <span class="error"> <?php echo $passwordErr; ?> </span>
            <br>
            Repeat password:
            <input type="password" name="repassword" class="form-control">
            <span class="error"> <?php echo $repasswordErr; ?> </span>
            <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
