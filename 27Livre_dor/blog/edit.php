<?php
$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$error = null;
$id = $pdo->quote($_GET['id']);

try {
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $post =$query->fetch();
} catch (PDOException $e) {
    $error = $e->getMessage();
}
require '../elements/header.php';
?>

<div class="container">
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="<?= htmlentities($post->name) ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" value=""><?= htmlentities($post->content) ?></textarea>
            </div>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    <?php endif ?>
</div>

<?php require '../elements/footer.php'; ?>
