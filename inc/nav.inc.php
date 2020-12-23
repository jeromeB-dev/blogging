<?
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    http_response_code(403);
    die('Direct access not allowed');
    exit();
};

// Requete de base
$sql = "SELECT * FROM users";

//Execution de la requete
$query = $db->prepare($sql);
$query->execute();
$users = $query->fetchAll();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
    <a class="navbar-brand" href="index.php" title="Blogging PDO">Blogging PDO</a>
    <button class="navbar-brand navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" title="Accueil">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" title="Voir les différents blogs" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Voir les différents blogs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?foreach ($users as $user) {?>
                    <a class="dropdown-item" href="user.php?id=<?=$user->id?>"
                        title="<?=$user->name?> (<?=$user->username?>)"><?=$user->name?>
                        (<?=$user->username?>)</a>
                    <?}?>
                </div>
            </li>
        </ul>
    </div>
</nav>