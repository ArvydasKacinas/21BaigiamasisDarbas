<?php

include ("classes/databaseConn-class.php");

class LogReg extends DatabaseConnection {
    public $vartotojai;


    public function __construct() {
        parent::__construct();

    }

    public function addNewUser($vardas,$pavarde,$slapyvardis,$slaptazodis) {
        $timestamp = date("Y-m-d");
        $teisesID=5;
        $vartotojas=array(
            "vardas"=>$vardas,
            "pavarde"=>$pavarde,
            "slapyvardis"=>$slapyvardis,
            "slaptazodis"=>$slaptazodis,
            "teises_ID"=>$teisesID,
            "registracijos_data"=>$timestamp,
        );
            $this->insertAction("vartotojai", ["vardas","pavarde","slapyvardis","slaptazodis","teises_ID","registracijos_data"], ["'".$vartotojas["vardas"]."'", "'".$vartotojas["pavarde"]."'", "'".$vartotojas["slapyvardis"]."'",  "'".$vartotojas["slaptazodis"]."'",   "'".$vartotojas["teises_ID"]."'" ,"'".$vartotojas["registracijos_data"]."'"]);
            header("location: vartotojai/regDone.php");
        } 
    

    public function createNewUser() {

        if(isset($_POST["registrate"])) {
            $vardas=$_POST["vardas"];
            $pavarde=$_POST["pavarde"];
            $slapyvardis=$_POST["slapyvardis"];
            $slaptazodis=$_POST["slaptazodis"];

           $tikrinimasV=$vardas;
           $tikrinimasP=$pavarde;
           $tikrinimasSV=$slapyvardis;
           $tikrinimasSZ=$slaptazodis;

           $existingUser=$this->checkUsername("vartotojai",$slapyvardis);
           
            if($tikrinimasV=="" OR $tikrinimasP=="" OR $tikrinimasSV=="" OR $tikrinimasSZ=="") {
                header("location: vartotojai/regFail.php");
            } else if($existingUser==1) {
                header("location: vartotojai/regFailU.php");
            } else {
                $this->addNewUser($vardas,$pavarde,$slapyvardis,$slaptazodis);
            }
        }
    }


    public function login() {
        if(isset($_POST["login"])) {
            $username=$_POST["slapyvardis"];
            $password=$_POST["slaptazodis"];
            // $dateOfLog=date("Y-m-d");

           $logInSuccessfull = $this->logIntoAcc("vartotojai",$username,$password);

           
           if($logInSuccessfull == 1) {
            // $this->saveDateOfLogin($dateOfLog);
            header("location: logged.php");
           } else {
            header("location: index.php");
           }
        } 
    }

    public function saveDateOfLogin() {
        $dateOfLog = date("Y-m-d");
        $vartotojas=array(
            "paskutinis_prisijungimas"=>$dateOfLog,
        );
            $this->updateAction("vartotojai", ["paskutinis_prisijungimas"], ["'".$vartotojas["paskutinis_prisijungimas"]."'"]);
            var_dump($vartotojas);
        } 

    public function logOut() {
        


    }

}

// $dateOfLogOut=date("Y-m-d");
// $vartotojas=array(
//     "paskutinis_prisijungimas"=>$dateOfLog
// );
// $this->insertAction("vartotojai", ["paskutinis_prisijungimas"], ["'".$vartotojas["paskutinis_prisijungimas"]."'"]);
// header("location: logged.php");
?>
