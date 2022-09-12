<?php include ("classes/logReg-class.php"); ?>
<?php 
$logReg= new LogReg();
$logReg->createNewUser();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
    <div>
        <form method="POST" required>
            <input class="form-control" name="vardas" placeholder="Vardas" >
            <input class="form-control" name="pavarde" placeholder="Pavardė" >
            <input class="form-control" name="slapyvardis" placeholder="Slapyvardis" >
            <input class="form-control" name="slaptazodis" type="password" placeholder="Slaptažodis" >
            <button  class="btn btn-info" type="submit" name="registrate" >Registruotis!</button>
        </form>
    </div>
</body>
</html>