<?php

    //konekcija
    $servername =  'localhost';
    $username = 'root';
    $password = '';

    $conn = new mysqli($servername, $username, $password);
    if($conn->connect_error)
    {
        die('Connection error: ' . $conn->connect_error);
    }

    echo 'Connection successful';

    //formiranje baze "test"
    $sql = "CREATE DATABASE IF NOT EXISTS test CHARACTER SET utf16";

    echo '<br>';
    if($conn->query($sql))
    {
        echo 'Database "test" is created successfully';
    }
    else
    {
        echo 'Error:' . $conn->error;
    }

    //formiranje tabele "users"
    $sql = 'USE test;';

    $sql = $sql . "CREATE TABLE IF NOT EXISTS users(
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL
                    );";

    echo '<br>';
    if($conn->multi_query($sql))
    {
        echo 'Table "users" is created successfully';
    }
    else
    {
        echo 'Error: ' . $conn->error;
    }