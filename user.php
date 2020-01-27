<?php

    require_once "connection.php";

    class User
    {
        private $username;
        private $password;
        private $email;

        public function __construct($username, $password, $email)
        {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
        }

        public function userCheck($username, $email)
        {
            $sql = "SELECT username, email
                FROM users
                WHERE username = '$username'
                OR email = '$email'";
        }

        public function registerUser()
        {
            $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username','$email', MD5('$password'))";
        }
    }
