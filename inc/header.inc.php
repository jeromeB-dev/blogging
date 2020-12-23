<?
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    http_response_code(403);
    die('Direct access not allowed');
    exit();
};

// DB connection part
require_once 'inc/db-connect.inc.php';
?>

<!-- header part -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap part -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <!-- Bootstrap part end -->
    <link rel="stylesheet" href="css/style-blogging.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="description" content="Blogging, Demo website, JB-dev">
    <!-- <title>Liste des utilisateurs</title> -->
    <?
    $title = isset($title) ? $title : 'Liste des utilisateurs';
    echo "<title>$title</title>";
    ?>
</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <div class="jumbotron">
                <div class="container rounded-lg bg-light shadow">
                    <h1 class="display-4 font-weight-bold">Plateforme de Blogging</h1>
                    <p class="lead">Ceci est un exercice permettant de travailler PHP et PDO.</p>
                </div>
            </div>
        </div>
        <?require_once 'inc/nav.inc.php';?>
    </header>