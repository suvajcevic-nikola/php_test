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
    }
