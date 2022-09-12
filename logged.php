<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="assets/style.css" rel="stylesheet">
    <title>Prisijungta</title>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center">
        <h1>Prisijungta prie sistemos</h1>
        <!-- <form method="POST">
            <button class="btn btn-danger" type="submit" name="logOut">Atsijungti</button>
            <?php
                // if(isset($_POST["logOut"])) {
                //     include("vartotojai/logOut.php");
                // }
            ?>
        </form> -->
    </div>
    <div>
    </div>
    <div class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="logged.php?page=main">Pagrindinis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logged.php?page=vartotojai">Vartotojai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logged.php?page=company">Įmonės</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logged.php?page=clients">Klientai</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger" role="button" href="index.php?page=pagrindinis">Atsijungti</a>
            </li>
        </ul>
        <?php 
            //pagal GET kintamaji mes busime nukreipiami į tam tikrus puslapius
        
            if(isset($_GET["page"])) {
                if(($_GET["page"]) == "vartotojai") {
                    include("valdymas/vartotojai.php");
                } else if(($_GET["page"]) == "company") {
                    include("valdymas/imones.php");
                } else if(($_GET["page"]) == "clients") {
                    include("valdymas/klientai.php");
                } else if(($_GET["page"]) == "pagrindinis") {
                    include("valdymas/main.php");
                } else if(($_GET["page"]) == "logout") {
                    include("vartotojai/index.php");
                } else {
                    include("valdymas/main.php");
                }
            }

        ?>
    </div>
</body>
</html>