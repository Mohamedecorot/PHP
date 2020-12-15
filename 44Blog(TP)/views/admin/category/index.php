<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$title = "Gestion des catégories";
$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();
?>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    La catégorie a bien été supprimé
</div>
<?php endif ?>

<table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Titre</th>
        <th>URL</th>
        <th>
            <a href="<?= $router->url('admin_category_new') ?>" class="btn btn-success">Créer une catégorie</a>
        </th>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
        <tr>
            <td>#<?= $item->getID() ?></td>
            <td>
                <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>">
                <?= e($item->getName()) ?>
                </a>
            </td>
            <td><?= $item->getSlug() ?></td>
            <td>
                <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>" class="btn btn-primary">
                Editer
                </a>
                <form action="<?= $router->url('admin_category_delete', ['id' => $item->getID()]) ?>" method="POST"
                onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" style="display:inline">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
