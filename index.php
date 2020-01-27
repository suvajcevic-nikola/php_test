<?php

require_once "user.php";

session_start();


?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <?php
        //ukoliko korinsik nije logovan
        if(empty($_SESSION['id']))
        {
            echo '<a href="login.php">Login</a>';
            echo "<br>";
            echo '<a href="register.php">Register</a>';
        }
        //ako je lgoovan
        if(!empty($_SESSION['id']))
        {
            echo "<a href='logout.php'>Logout</a>";
            echo "<h2> Welcome, " . $_SESSION['username'] . "! </h2>";
        }
        ?>
        <form action="result.php" method="GET">
            <label for="inputSearch">Search</label>
            <input type="search" name="keywords" class="form-control" autocomplete="off">
            <br>
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </form>
    </div>
</body>


</html>





