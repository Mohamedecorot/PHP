<?php

use App\Connection;
use App\Table\PostTable;

$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);
$success = false;
$errors = [];

if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        $errors['name'][] = 'Le champ titre ne peut être vide';
    }
    if (mb_strlen($_POST['name']) <= 3) {
        $errors['name'][] = 'Le champ titre doit contenir plus de 3 caractères';
    }
    $post->setName($_POST['name']);
    if (empty($errors)) {
        $postTable->update($post);
        $success = true;
    }
}
?>

<?php if ($success): ?>
<div class="alert alert-success">
    L'article a bien été modifié
</div>
<?php endif ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
    L'article n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>

<h1>Editer l'article <?= e($post->getName()) ?></h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="name">Titre</label>
        <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= e($post->getName()) ?>" >
    </div>
    <?php if (isset($errors['name'])): ?>
    <div class="invalid-feedback">
        <?= implode('<br>', $errors['name']) ?>
    </div>
    <?php endif ?>
    <button class="btn btn-primary">Modifier</button>
</form>