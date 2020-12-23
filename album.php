<?
// page album
$title = "Album";
require_once 'inc/header.inc.php';

//Récup et filtre
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) { //Si id ok
    // album data
    $qry_album = $db->prepare("SELECT users.id AS owner_id, users.name AS owner, title FROM `albums` INNER JOIN users ON albums.userId = users.id WHERE albums.id = :id");
    $qry_album->execute([':id' => $id]);
    $album_infos = $qry_album->fetch();
    // album photos
    $qry_photos = $db->prepare("SELECT * FROM photos WHERE albumId = :id");
    $qry_photos->execute([':id' => $id]);
    $photos = $qry_photos->fetchAll();
} else { //Sinon afficher erreur
    exit('Erreur système');
}
?>
<div class="container-fluid">
    <div class="my-3 border-bottom">
        <h2 class="text-center">Nom de l'album : <?=$album_infos->title?></h2>
        <h5 class="text-center">Propriétaire : <a href="user.php?id=<?=$album_infos->owner_id?>"
                title="Retour fiche propriétaire"><span class="text-success"><?=$album_infos->owner?></span></a></h5>
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <?foreach ($photos as $photo) {?>
            <div class="card m-1" style="width: 18rem;">
                <img src="<?=$photo->thumbnailUrl?>" class="card-img-top" alt="<?=$photo->title?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$photo->title?></h5>
                </div>
                <div class="card-footer text-center">
                    <a href="<?=$photo->url?>" title="Voir la photo <?=$photo->title?> dans un nouvel onglet"
                        class="btn btn-info" target="_blank">Voir la photo</a>
                </div>
            </div>
            <?}?>
        </div>
    </div>
</div>
<div>
    <a id="back-to-top" href="#" title="Retourner en haut" class="btn btn-light btn-lg back-to-top" role="button">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<?require_once 'inc/footer.inc.php'?>