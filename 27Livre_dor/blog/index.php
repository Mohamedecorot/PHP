<?php

use App\Post;

require_once '../vendor/autoload.php';
$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//les transactions c'est ce qui permet de faire plusieurs requêtes, les unes après les autres
$error = null;
try {
    if (isset($_POST['name'], $_POST['content'])) {
        $query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES (:name, :content, :created_at)');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'created_at' => time()
        ]);
        header('Location: /blog/edit.php?id=' . $pdo->lastInsertId());
    }
    $query = $pdo->query('SELECT * FROM posts');
    /** @var Post[] */
    $posts =$query->fetchAll(PDO::FETCH_CLASS, Post::class);
} catch (PDOException $e) {
    $error = $e->getMessage();
}
// if ($query === false) {
//     var_dump($pdo->errorInfo());
//     die('Erreur SQL');
//}
require '../elements/header.php';
?>

<div class="container">
    <h2>Liste des articles</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
        <ul>
            <?php foreach($posts as $post): ?>
                <h3><a href="/blog/edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h3>
                <p class="small text-muted">Ecrit le <?= $post->created_at->format('d/m/Y à H:i') ?>)</p>
                <p>
                    <?= nl2br(htmlentities($post->getExcerpt())) ?>
                </p>
            <?php endforeach ?>
        </ul>

        <h2>Ajouter un article</h2>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="" placeholder="Titre de l'article">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" value="" placeholder="Contenu de l'article"></textarea>
            </div>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>

    <?php endif ?>
</div>

<?php require '../elements/footer.php'; ?>
