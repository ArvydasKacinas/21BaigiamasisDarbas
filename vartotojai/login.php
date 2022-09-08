<?php include ("classes/logReg-class.php"); ?>
<?php
$logReg= new LogReg();
//sitoje vietoje kviesiu tiesiai kol kas ne login, bet l
// viskas veikia dabar
 $logReg->login();
//teisingi duomenys grazino 1
// $logReg->logIntoAcc("vartotojai", "laikas", "laikas");
//neteisingi grazino 0
// $logReg->logIntoAcc("vartotojai", "laikas", "laikas1");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungti</title>
</head>
<body>
    <div class="form-outline mb-4">
        <form method="POST">
            <input class="form-control" name="slapyvardis" placeholder="Slapyvardis" >
            <input class="form-control" name="slaptazodis" type="password" placeholder="Slaptažodis" >
            <button class="btn btn-primary" type="submit" name="login">Prisijungti</button>

            <?php

                // if(isset($_POST["login"])) {
                //     $vartotojai->login();
                // }     

            ?>
        </form>
    </div>
</body>
</html>