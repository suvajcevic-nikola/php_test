<?php

require_once "user.php";

session_start();


    if(empty($_SESSION['id']))
    {
        echo '<a href="login.php">Login</a>';
        echo '<a href="register.php">Register</a>';
    }
    if(!empty($_SESSION['id']))
    {
        echo "<h2> Welcome, " . $_SESSION['username'] . "! </h2>";
        echo $_SESSION['id'];
    }


