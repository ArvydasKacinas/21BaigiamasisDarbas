<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="assets/style.css" rel="stylesheet">
    <title>Baigiamoji užduotis</title>
</head>
<body>
    <div class="d-flex align-items-center justify-content-around">
        <div class="logo">
            <img class="logo" src="assets/logo.png" width="64px" height="64px">
        </div>
        <h1>Sveiki atvykę</h1>
    </div>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=pagrindinis">Pagrindinis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=prisijungti">Prisijungti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=registruotis">Registruotis</a>
            </li>
        </ul>   
        <?php 
        
            if(isset($_GET["page"])) {
                // 1 = Ijungta ; 0 = Isjungta
                $regOnOff=1;

                if(($_GET["page"]) == "prisijungti") {
                    include("vartotojai/login.php");
                } else if(($_GET["page"]) == "registruotis" && $regOnOff==1) {
                    include("vartotojai/registration.php");
                } else if(($_GET["page"]) == "registruotis" && $regOnOff==0) {
                    include("vartotojai/regOFF.php");
                } else if(($_GET["page"]) == "pagrindinis") {
                    include("vartotojai/index.php");
                } else {
                    include("vartotojai/index.php");
                }
            }
            //     if(isset($_GET["page"])) {
            //         if(isset($_GET["page"])=="prisijungti") {
            //             include("vartotojai/login.php");
            //         } else if(isset($_GET["page"])=="registruotis") {
            //         // 1 = Ijungta ; 0 = Isjungta
            //         $registracijaOnOff="1";

            //         if($registracijaOnOff==1) {
            //         header("location: vartotojai/regOFF.php");
            //     } 
            //         include("vartotojai/registration.php");
            //     }   else {
            //         header("Location: index.php");
            //     }
            // }
        ?>
    </div>

    <!-- <div class="d-flex align-items-center justify-content-center vh-100">
        <form method="GET">
            <button class="btn btn-primary" type="submit" name="loginPage">Prisijungimo meniu</button>
            <button class="btn btn-info" type="submit" name="regPage">Registracija naujiems vartotojams!</button>
        </form>
        <?php
                // if(isset($_GET["loginPage"])) {
                //     include("vartotojai/login.php");
                // } else if(isset($_GET["regPage"])) {
                //     // 1 = Ijungta ; 0 = Isjungta
                //     $registracijaOnOff="1";

                //     if($registracijaOnOff==0) {
                //     header("location: vartotojai/regOFF.php");
                // }   else 
                //     include("vartotojai/registration.php");
                // } // else {
                //     // header("Location: index.php");
                // }
        ?>
    </div> -->


</body>
</html>