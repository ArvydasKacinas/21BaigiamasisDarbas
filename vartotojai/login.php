<?php include ("classes/logReg-class.php"); ?>


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
        </form>
    </div>
</body>
</html>