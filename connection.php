<?php

class Connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'test');

        if($this->conn->connect_error)
        {
            die('Connection error: ' . $this->conn->connect_error);
        }

    }

}