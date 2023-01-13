<?php

class Database
{
    public $conn;

    /**
     * @param
     */
    public function __construct()
    {
        $this->conn = new PDO('mysql:dbname=test;host=localhost','root','');
    }

    public function getDays() {
        $stmt = $this->conn->prepare('SELECT * FROM days');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGames() {
        $stmt = $this->conn->prepare('SELECT * FROM games');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTime() {
        $stmt = $this->conn->prepare('SELECT * FROM times');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}