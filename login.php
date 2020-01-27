<?php

require_once 'user.php';

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User('', $password, $email);

    //provera email i sifre
    $result = $user->loginCheck($email, $password);

    //provera da li metoda vraca redove
    if($result)
    {
        //login i redirekcija na index.php
        session_start();

        $row = $result->fetch_assoc();
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

</head>
<body>
<h2>Login</h2>
<form action="login.php" method="post">
    Email:
    <input type="text" name="email">
    <br><br>
    Password:
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="login" title="Login">
</form>
</body>
</html>