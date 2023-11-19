<?php

class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "proiect_evenimente";
    private static $conn;

    function __construct() {
        if (self::$conn == null) {
            self::$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if (self::$conn->connect_error) {
                exit('Failed to connect to MySQL: ' . self::$conn->connect_error);
            }
        }
    }

    public static function getConnection() {
        if (self::$conn == null) {
            new DBController();
        }
        return self::$conn;
    }

    // Restul metodelor (getDBResult, updateDB, bindParams) rămân neschimbate.
}
?>
