<?php

class DBconnection
{
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "ecommerce";

    public static $connectionInstance = null;


    public function __construct()
    {
        $this->connect();
    }


    public function connect()
    {
        if (self::$connectionInstance == null) {
            self::$connectionInstance = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        }
        return self::$connectionInstance;
    }

    public function getIndexPageNumber()
    {
        $sql = "SELECT COUNT(idlaptop) as total FROM detaillaptop";
        if (self::$connectionInstance) {
            $stmt = mysqli_stmt_init(self::$connectionInstance);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    $getLength = $result->fetch_assoc();
                    // echo "<pre>";
                    return ($getLength['total']);
                    // die();
                }
            }
        }
    }
    public function __destruct()
    {
        mysqli_close(self::$connectionInstance);
    }
}
