<?php

namespace App\Helpers;

use mysqli;

class DB
{
    private $hostname = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    private $conn;
    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        if (!$this->conn) {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
            if (!$this->conn) {
                throw new \Exception("Error In Database Connection");
            }
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function query(string $sql)
    {
        return $this->conn->query($sql);
    }
}