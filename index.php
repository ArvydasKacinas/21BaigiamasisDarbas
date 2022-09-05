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
    <div class="d-flex align-items-center justify-content-center vh-100">
        <form method="GET">
            <button class="btn btn-primary" type="submit" name="loginPage">Prisijungimo meniu</button>
            <button class="btn btn-info" type="submit" name="regPage">Registracija naujiems vartotojams!</button>
        </form>
        <?php
                if(isset($_GET["loginPage"])) {
                    include("vartotojai/login.php");
                } else if(isset($_GET["regPage"])) {
                    include("vartotojai/registration.php");
                } else {
                    // header("Location: index.php");
                }
        ?>
    </div>


</body>
</html>