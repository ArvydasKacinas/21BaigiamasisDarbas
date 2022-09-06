<?php

include ("classes/databaseConn-class.php");

class LogReg extends DatabaseConnection {
    public $vartotojai;


    public function __construct() {
        parent::__construct();

    }

    public function createNewUser() {

        if(isset($_POST["registrate"])) {
            $ErrVardas=$_POST["vardas"]="";
            $ErrPavarde=$_POST["pavarde"]="";
            $ErrSlapyvardis=$_POST["slapyvardis"]="";
            $ErrSlaptazodis=$_POST["slaptazodis"]="";

            $timestamp = date("Y-m-d");
            $teisesID=5;
            $vartotojas=array(
                "vardas"=>$_POST["vardas"],
                "pavarde"=>$_POST["pavarde"],
                "slapyvardis"=>$_POST["slapyvardis"],
                "slaptazodis"=>$_POST["slaptazodis"],
                "teises_ID"=>$teisesID,
                "registracijos_data"=>$timestamp,
            );
                $this->insertAction("vartotojai", ["vardas","pavarde","slapyvardis","slaptazodis","teises_ID","registracijos_data"], ["'".$vartotojas["vardas"]."'", "'".$vartotojas["pavarde"]."'", "'".$vartotojas["slapyvardis"]."'",  "'".$vartotojas["slaptazodis"]."'",   "'".$vartotojas["teises_ID"]."'" ,"'".$vartotojas["registracijos_data"]."'"]);
                header("location: vartotojai/regdone.php");
            } 
    
        }


    public function login() {
        if(isset($_POST["login"])) {
            $username=$_POST["slapyvardis"];
            $password=$_POST["slaptazodis"];

            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($conn, $username);  
            $password = mysqli_real_escape_string($conn, $password);  
          
            $sql = "select *from login where username = '$username' and password = '$password'";  
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                header("location: logged.php");  
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }  

        }
    }

}

?>