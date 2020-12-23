<?
// page user
$title = "Profil";
require_once 'inc/header.inc.php';

//Récup et filtre
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) { //Si id ok
    // user datas
    $qry_user = $db->prepare("SELECT * FROM users WHERE id = :id");
    $qry_user->execute([':id' => $id]);
    $user = $qry_user->fetch();
    // [TODO] voir db-connect
    // user todos
    $qry_todos = $db->prepare("SELECT * FROM todos WHERE userId = :id");
    $qry_todos->execute([':id' => $id]);
    $todos = $qry_todos->fetchAll();
    // user albums
    $qry_albums = $db->prepare("SELECT * FROM albums WHERE userId = :id");
    $qry_albums->execute([':id' => $id]);
    $albums = $qry_albums->fetchAll();
    // user posts
    $qry_posts = $db->prepare("SELECT * FROM posts WHERE userId = :id");
    $qry_posts->execute([':id' => $id]);
    $posts = $qry_posts->fetchAll();
} else { //Sinon afficher erreur
    exit('Erreur système');
}
?>
<div class="container">
  <h2 class="text-center my-3">Profil de <span class="text-success"><?=$user->name?></span></h2>
</div>
<div class="container mt-4">
  <div class="row d-flex justify-content-between">
    <!-- user datas start -->
    <div class="col-lg-5 shadow p-3 mb-5 bg-white rounded">
      <h4 class="bg-dark p-3 text-white text-center my-3">INFORMATIONS PERSONNELLES</h4>
      <dl class="row">
        <dt class="col-sm-3">Nom : </dt>
        <dd class="col-sm-9"><?=$user->name?></dd>
        <dt class="col-sm-3">Login : </dt>
        <dd class="col-sm-9"><?=$user->username?></dd>
        <dt class="col-sm-3">Email : </dt>
        <dd class="col-sm-9"><?=$user->email?></dd>
        <dt class="col-sm-3">Adresse : </dt>
        <dd class="col-sm-9">
          <span><?=$user->addressstreet?><br><?=$user->addresssuite?></span><br>
          <span><?="$user->addresszipcode $user->addresscity"?></span>
        </dd>
        <dt class="col-sm-3">Téléphone : </dt>
        <dd class="col-sm-9"><?=$user->phone?></dd>
        <dt class="col-sm-3">Entreprise : </dt>
        <dd class="col-sm-9">
          <ul>
            <li>Nom : <?=$user->companyname?></li>
            <li>site : <a href="#" title="site entreprise de <?=$user->name?>"><?=$user->website?></a></li>
            <li>slogan : <?=$user->companycatchPhrase?></li>
          </ul>
        </dd>
      </dl>
    </div>
    <!-- todos list start -->
    <div class="col-lg-6 shadow p-3 mb-5 bg-white rounded">
      <h4 class="bg-dark p-3 text-white text-center my-3">TODOS LIST</h4>
      <ul>
        <?foreach ($todos as $todo) {?>
        <li class="<?=(filter_var($todo->completed, FILTER_VALIDATE_BOOLEAN)) ? 'text-success' : 'text-danger'?>">
          <?="#$todo->id $todo->title"?></li>
        <?}?>
      </ul>
      <!-- todos list end -->
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row d-flex justify-content-between">
    <!-- albums start -->
    <div class="col-lg-5 shadow p-3 mb-5 bg-white rounded">
      <h4 class="bg-dark p-3 text-white text-center my-3">ALBUMS PHOTOS</h4>
      <ul>
        <?foreach ($albums as $album) {?>
        <li>#<?=$album->id?><a href="album.php?id=<?=$album->id?>" title="Album <?=$album->title?>"> <?=$album->title?></a></li>
        <?}?>
      </ul>
      <!-- album end -->
    </div>
    <!-- posts start -->
    <div class="col-lg-6 shadow p-3 mb-5 bg-white rounded">
      <h4 class="bg-dark p-3 text-white text-center my-3">ARTICLES</h4>
      <ul>
        <?foreach ($posts as $post) {?>
        <li>#<?=$post->id?><a href="post.php?id=<?=$post->id?>" title="Article <?=$post->title?>"> <?=$post->title?></a></li>
        <?}?>
      </ul>
      <!-- album end -->
    </div>
  </div>
  <!-- user datas end -->
</div>
<?require_once 'inc/footer.inc.php'?>