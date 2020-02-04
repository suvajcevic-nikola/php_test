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

    public function runQuery($query)
    {
        if(!$this->conn->error)
        {
            return $this->conn->query($query);
        }
        else
        {
            echo 'Error';
        }
    }

    public function safeInput($input)
    {
        return $this->conn->real_escape_string($input);
    }
}