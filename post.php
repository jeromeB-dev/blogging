<?
// page post
$title = "Article";
require_once 'inc/header.inc.php';

//Récup et filtre
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) { //Si id ok
    // post data
    $qry_post = $db->prepare("SELECT users.id AS author_id, users.name AS author, posts.id, title, body FROM posts INNER JOIN users ON posts.userId = users.id WHERE posts.id = :id");
    $qry_post->execute([':id' => $id]);
    $post_infos = $qry_post->fetch();
    // post comments
    $qry_comments = $db->prepare("SELECT * FROM comments WHERE postId = :id");
    $qry_comments->execute([':id' => $id]);
    $comments = $qry_comments->fetchAll();
} else { //Sinon afficher erreur
    exit('Erreur système');
}
?>
<div class="container-fluid">
    <div class="my-3 border-bottom">
        <h5 class="text-center">Auteur : <a href="user.php?id=<?=$post_infos->author_id?>"
                title="Retour fiche auteur"><span class="text-success"><?=$post_infos->author?></span></a></h5>
    </div>
    <div class="container">
        <h2>Article</h2>
        <div class="card mb-5">
            <h5 class="card-header bg-success"><?=$post_infos->title?></h5>
            <div class="card-body">
                <h5 class="card-title">#<?=$post_infos->id?></h5>
                <p class="card-text"><?=$post_infos->body?></p>
            </div>
        </div>
        <h2 class="text-right">Commentaires</h2>
        <?foreach ($comments as $comment) {?>
        <div class="card ml-5 mb-2">
            <h5 class="card-header bg-info"><?=$comment->name?></h5>
            <div class="card-body">
                <h5 class="card-title">#<?=$comment->id?></h5>
                <p class="card-text"><?=$comment->body?></p>
            </div>
            <div class="card-footer text-right">
                <label class="text-left"><?=$comment->email?></label>
            </div>
        </div>
        <?}?>
    </div>
</div>
<div>
    <a id="back-to-top" href="#" title="Retourner en haut" class="btn btn-light btn-lg back-to-top" role="button">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<?require_once 'inc/footer.inc.php'?>