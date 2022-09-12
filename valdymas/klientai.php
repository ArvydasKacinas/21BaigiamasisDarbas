<?php include ("classes/logReg-class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientai</title>
</head>
<body>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Teisės ID</th>
            <th>Aprašymas</th>
            <th>Įmonės ID</th>
            <th>Pridėjimo data</th>
            <th>Veiksmai</th>
        </tr>
        <?php $klientai = new LogReg(); ?>
        <?php $klientai->klientaiSelect("klientai"); ?>
        <?php // $vartotojai->deleteMovie(); ?>
    </table>
</body>
</html>