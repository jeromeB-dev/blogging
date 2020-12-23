<?
// page index
$title = "Liste des utilisateurs";
require_once 'inc/header.inc.php';
?>
<main>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-6 text-justify">
                <p>
                    Cet exercice permet de travailler PHP/PDO et les bases de données. Cliquez sur la liste dans la
                    barre de navigation pour voir les différents blogs des utilisateurs de ce site.
                </p>
                <p><u>Chaque utilisateurs dispose de plusieurs "entités" :</u></p>
                <ul>
                    <li>informations personnelles</li>
                    <li>tâches (todos)</li>
                    <li>albums photos + photos</li>
                    <li>articles + commentaires</li>
                </ul>
                <p>
                    A vous d'aller requeter la base de données pour afficher correctement tout cela, sur le modèle
                    de ce site.
                    Vous pouvez personnaliser ou agrémenter ce que vous voulez tant que toutes les données sont
                    accessibles facilement, et que vous suivez à peu près cet exemple.
                </p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded shadow-sm" src="img/home.jpg" alt="Home">
            </div>
        </div>
    </div>
</main>
<?require_once 'inc/footer.inc.php'?>