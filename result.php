<?php

session_start();

require_once 'user.php';


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

        if(isset($_GET['keywords']))
        {
            //checking if user is logged in

            if(empty($_SESSION['id']))
            {
                echo "Please Login or Register";
                echo "<br>";
                echo '<a href="login.php">Login</a>';
                echo "<br>";
                echo '<a href="register.php">Register</a>';

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

            <?php
            }
            //user is logged in, showing search results
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

        ?>

    </div>

</body>


</html>
