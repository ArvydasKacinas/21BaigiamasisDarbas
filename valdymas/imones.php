<?php include ("classes/logReg-class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Įmonės</title>
</head>
<body>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>Tipas_ID</th>
            <th>Aprašymas</th>
            <th>Veiksmai</th>
        </tr>
        <?php $imones = new LogReg(); ?>
        <?php $imones->imonesSelect("imones"); ?>
        <?php // $vartotojai->deleteMovie(); ?>
    </table>


</body>
</html>