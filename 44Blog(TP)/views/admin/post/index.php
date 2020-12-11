<?php

use App\Connection;
use App\Table\PostTable;

$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
?>

<table class="table table-striped">
    <thead>
        <th>Titre</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= e($post->getName()) ?></td>
            <td>

            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>