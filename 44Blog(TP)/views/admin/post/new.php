<?php

use App\HTML\Form;
use App\Connection;
use App\Model\Post;
use App\ObjectHelper;
use App\Table\PostTable;
use App\Validators\PostValidator;

$errors = [];
$success = false;
$post = new Post();
$post->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $postTable = new PostTable($pdo);
    $success = false;
    $v = new PostValidator($_POST, $postTable, $post->getID());
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);
    if ($v->validate()) {
        $postTable->create($post);
        header('Location: ' . $router->url('admin_post', ['id' => $post->getID()]) . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
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

<h1>Créer un article</h1>

<?php require ('_form.php') ?>