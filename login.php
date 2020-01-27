<?php

require_once 'user.php';

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User('', $password, $email);

    //provera email i sifre
    $result = $user->loginCheck($email, $password);
    $row = $result->fetch_assoc();

    //provera da li metoda vraca redove
    if($row)
    {
        //login i redirekcija na index.php
        session_start();

        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['id'] = $row['id'];

        header('Location: index.php');
    }
    else
    {
        //nema redova, greska
        echo 'Unsuccessful Login';
    }

}


?>




<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h3>Login</h3>
        <form action="login.php" method="post">
            Email:
            <input type="text" name="email" class="form-control">
            <br>
            Password:
            <input type="password" name="password" class="form-control">
            <br>
            <input type="submit" name="login" title="Login" class="btn btn-primary">
        </form>
    </div>
</body>
</html>