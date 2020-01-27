<?php

session_start();

require_once 'user.php';

if(isset($_GET['keywords']))
{
    if(empty($_SESSION['id']))
    {
        echo "Please Login or Register";
        echo '<a href="login.php">Login</a>';
        echo '<a href="register.php">Register</a>';
    }
    if(!empty($_SESSION['id']))
    {
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $keywords = $_GET['keywords'];

        $user = new User('', $password, $email);

        $result = $user->search($keywords);

        if ($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $name = $row['username'];
                $email = $row['email'];
                echo "Usrename: " . $name . ", " . "Email: " . $email;

            }
        }
    }


};