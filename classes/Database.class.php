<?php

class Database
{
    private $host = "silva.computing.dundee.ac.uk";
    private $databaseName = "22ac3d01";
    private $userName = "22ac3u01";
    private $password = "ab123c";

    protected function connect()
    {

        try {
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->databaseName, $this->userName, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
