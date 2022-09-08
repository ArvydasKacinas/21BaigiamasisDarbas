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

    public function logIntoAcc($table,$username,$password) {

        //pirma pasitikrinam ar sitas sql veikia gerai
        //truksta dar $table
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //cia turi buti stulpeliu pavadinimai tokie kaip duomenu bazeje
            $sql = "SELECT * FROM `$table` WHERE slapyvardis = '$username' and slaptazodis = '$password'";
            //var_dump($sql);
            //sitoje vietoje as pakeiciau jungimasi prie mysql, nes tavo uzkomentuotas budas nelabai tinka, nes 
            //jis proceduurinis, o ne objektinis
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $count = count($result);
            // $result = mysqli_query($this->conn, $sql);  
            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            // $count = mysqli_num_rows($result);

            //sitos uzklausos rezultatas yra $count jei $count = 1, viskas ok login ivyko, jei ne 1 - prisijungimas 
            // nesekmingas
            //del to dumpink ne sql o count
            //dabar sitas metodas veiks viskas gerai. Galima sutvarkyti login
            return $count;


        } catch (PDOException $e) {
            echo "<h1> Login failed. Invalid username or password.</h1>: " . $e->getMessage();
        }
    }


    public function updateAction($table, $username, $password, $dateOfLog, $data) {
        $cols = array_keys($data);
        $values = array_values($data);

        $dataString = [];
        for ($i=0; $i<count($cols); $i++) {
           $dataString[] = $cols[$i] . " = '" . $values[$i]. "'";
        }
        $dataString = implode(",", $dataString);
        var_dump($dataString);

       try{
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "UPDATE `$table` 
              SET paskutinis_prisijungimas = $dateOfLog
              WHERE slapyvardis = '$username' and slaptazodis = '$password'";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
              echo "Pavyko atnaujinti irasa";
         } 
       catch(PDOException $e) {
              echo "Nepavyko atnaujinti iraso: " . $e->getMessage();
       }
    }
}


?>
