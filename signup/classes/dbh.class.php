<?php

class Dbh
{
    public $connectionErr;

    public function connect()
    {

        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $conn = new PDO("mysql:host=$servername;dbname=dokkaneh", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
            // echo "Connected successfully";
        } catch (PDOException $e) {
            $this->connectionErr = "Connection failed: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
