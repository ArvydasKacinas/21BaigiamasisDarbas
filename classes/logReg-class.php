<?php

include ("classes/databaseConn-class.php");

class LogReg extends DatabaseConnection {
    public $vartotojai;
    public $imones;
    public $klientai;


    public function __construct() {
        parent::__construct();

    }

    public function vartotojaiSelect() {
        $this->vartotojai = $this->selectAction("vartotojai");
        
        if(!isset($_GET["vartotojai"])) {
            foreach ($this->vartotojai as $vartotojas) {
                echo "<tr>";
                echo "<td>".$vartotojas["ID"]."</td>";
                echo "<td>".$vartotojas["vardas"]."</td>";
                echo "<td>".$vartotojas["pavarde"]."</td>";
                echo "<td>".$vartotojas["slapyvardis"]."</td>";
                echo "<td>".$vartotojas["teises_ID"]."</td>";
                echo "<td>".$vartotojas["slaptazodis"]."</td>";
                echo "<td>".$vartotojas["registracijos_data"]."</td>";
                echo "<td>".$vartotojas["paskutinis_prisijungimas"]."</td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$vartotojas["ID"]."'>";
                echo "<button class='btn btn-danger btn-sm' type='submit' name='delete'>DELETE</button>";
                echo "</form>";
                // echo "<a href='index.php?page=update&id='. $movie["id"]. "' class='btn btn-success'>EDIT</a>";
                echo "<a href='index.php?page=update&id=".$vartotojas["ID"]."' class='btn btn-success btn-sm'>EDIT</a>";
                echo "</td>";
                echo "</tr>";

            }
        }
    }

    public function imonesSelect() {
        $this->imones = $this->selectAction("imones");
        
        if(!isset($_GET["company"])) {
            foreach ($this->imones as $imone) {
                echo "<tr>";
                echo "<td>".$imone["ID"]."</td>";
                echo "<td>".$imone["pavadinimas"]."</td>";
                echo "<td>".$imone["tipas_ID"]."</td>";
                echo "<td>".$imone["aprasymas"]."</td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$imone["ID"]."'>";
                echo "<button class='btn btn-danger btn-sm' type='submit' name='delete'>DELETE</button>";
                echo "</form>";
                // // echo "<a href='index.php?page=update&id='. $movie["id"]. "' class='btn btn-success'>EDIT</a>";
                echo "<a href='index.php?page=update&id=".$imone["ID"]."' class='btn btn-success btn-sm'>EDIT</a>";
                echo "</td>";
                echo "</tr>";

            }
        }
    }

    public function klientaiSelect() {
        $this->klientai = $this->selectAction("klientai");
        
        if(!isset($_GET["clients"])) {
            foreach ($this->klientai as $klientas) {
                echo "<tr>";
                echo "<td>".$klientas["ID"]."</td>";
                echo "<td>".$klientas["vardas"]."</td>";
                echo "<td>".$klientas["pavarde"]."</td>";
                echo "<td>".$klientas["teises_id"]."</td>";
                echo "<td>".$klientas["aprasymas"]."</td>";
                echo "<td>".$klientas["imones_id"]."</td>";
                echo "<td>".$klientas["pridejimo_data"]."</td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$klientas["ID"]."'>";
                echo "<button class='btn btn-danger btn-sm' type='submit' name='delete'>DELETE</button>";
                echo "</form>";
                // // echo "<a href='index.php?page=update&id='. $movie["id"]. "' class='btn btn-success'>EDIT</a>";
                echo "<a href='index.php?page=update&id=".$klientas["ID"]."' class='btn btn-success btn-sm'>EDIT</a>";
                echo "</td>";
                echo "</tr>";

            }
        }
    }

    // public function regOn() {
    //     if(isset($_POST["ijungti"])) {
    //         $regFormScore=1;
    //     }

    // }

    // public function regOff() {
    //     if(isset($_POST["isjungti"])) {
    //         $regFormScore=0;
            
    //     }
    // }

    // public function regForm($regFormScore) {
    //     if(isset($_GET["page"])=="registruotis") {


    //         if($regFormScore==1) {
    //             include("vartotojai/registration.php");
    //         } else if($regFormScore==0) {
    //             include("vartotojai/regOFF.php");
    //         }
    //     }
    // }

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

    // public function saveDateOfLogin() {
    //     $dateOfLog = date("Y-m-d");
    //     $vartotojas=array(
    //         "paskutinis_prisijungimas"=>$dateOfLog,
    //     );
    //         $this->updateAction("vartotojai", ["paskutinis_prisijungimas"], ["'".$vartotojas["paskutinis_prisijungimas"]."'"]);
    //         var_dump($vartotojas);
    //     } 

    // public function logOut() {
    // }

    public function __destruct() {
        $this->conn = null;
    }

}

// $dateOfLogOut=date("Y-m-d");
// $vartotojas=array(
//     "paskutinis_prisijungimas"=>$dateOfLog
// );
// $this->insertAction("vartotojai", ["paskutinis_prisijungimas"], ["'".$vartotojas["paskutinis_prisijungimas"]."'"]);
// header("location: logged.php");
?>
