<?php

class DatabaseHandler
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    private function __construct()
    {
        $this->servername = "lochnagar.abertay.ac.uk";
        $this->username = "sql1900040";
        $this->password = "EVUrsMKYpvIn";
        $this->dbname = $this->username;

        $this->connect();
    }

    protected function connect()
    {
        try {
            return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        } catch (mysqli_sql_exception $e) {
            die($e);
        }
    }
}