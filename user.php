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

            $conn = new Connection();
            $result = $conn->runQuery($sql);

            return $result;
        }

        public function registerUser()
        {
            $username = $this->username;
            $email = $this->email;
            $password = $this->password;

            $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username','$email', MD5('$password'))";

            $conn = new Connection();
            $conn->runQuery($sql);
        }

        public function loginCheck($email, $password)
        {
            $conn = new Connection();

            $sql = "SELECT *
                FROM users
                WHERE email = '$email'
                AND password = MD5('$password')";

            $result = $conn->runQuery($sql);

            return $result;
        }

        public function search($keywords)
        {
            $conn = new Connection();

            $sql = "SELECT * FROM users WHERE username LIKE '%{$keywords}%' OR email LIKE '%{$keywords}%'";

            $result = $conn->runQuery($sql);

            return $result;
        }
    }
