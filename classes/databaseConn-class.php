<?php

class DatabaseConnection {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "valdymo_sistema";

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->conn->exec("set names utf8");
        //    echo "Prisijungta prie duomenu bazes sekmingai";
        //    echo "<h1>hi</h1>";
        } catch(PDOException $e) {
           echo "Prisijungti prie duomenu bazes nepavyko: " . $e->getMessage();
        }

    }

    public function insertAction($table, $cols, $values) {

        $cols = implode(",", $cols);
        $values = implode(",", $values);

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "INSERT INTO `$table` ($cols) VALUES ($values)";
            // var_dump($sql);
            $this->conn->exec($sql);
            // echo "Pavyko sukurti nauja irasa";

        } catch (PDOException $e) {
            echo "Nepavyko sukurti naujo iraso: " . $e->getMessage();
        }

    }
    
}


?>
