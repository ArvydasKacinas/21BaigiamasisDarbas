<?php

include ("classes/databaseConn-class.php");

class LogReg extends DatabaseConnection {
    public $vartotojai;


    public function __construct() {
        parent::__construct();

    }

    public function createNewUser() {
        if(isset($_POST["registrate"])) {
            $timestamp = date("Y-m-d");
            $vartotojas=array(
                "vardas"=>$_POST["vardas"],
                "pavarde"=>$_POST["pavarde"],
                "slapyvardis"=>$_POST["slapyvardis"],
                "slaptazodis"=>$_POST["slaptazodis"],
                "registracijos_data"=>$timestamp,
            );
            $this->insertAction("vartotojai", ["vardas","pavarde","slapyvardis","slaptazodis","registracijos_data"], ["'".$vartotojas["vardas"]."'", "'".$vartotojas["pavarde"]."'", "'".$vartotojas["slapyvardis"]."'",  "'".$vartotojas["slaptazodis"]."'",  "'".$vartotojas["registracijos_data"]."'"]);
        } 
    
    }

}

?>