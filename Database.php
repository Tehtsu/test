<?php

class Database
{
    private $conn;

    /**
     * @param
     */
    public function __construct()
    {
        $this->conn = new PDO('mysql:dbname=test;host=localhost','root','');
    }

    public function getDays() {
        $stmt = $this->conn->prepare('SELECT name FROM days');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGames() {
        $stmt = $this->conn->prepare('SELECT name FROM games');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTime() {
        $stmt = $this->conn->prepare('SELECT time FROM time');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}