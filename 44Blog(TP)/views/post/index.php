<?php
use App\URL;
use App\Connection;
use App\Model\Post;
use App\Helpers\Text;
use App\model\Category;
use App\PaginatedQuery;

$title = 'Mon blog';
$pdo = Connection::getPDO();

$paginatedQuery = new PaginatedQuery(
    "SELECT * FROM post ORDER BY created_at DESC",
    "SELECT COUNT(id) FROM post"
);
$posts = $paginatedQuery->getItems(Post::class);
$ids = [];
foreach ($posts as $post) {
    $ids[] = $post->getID();
}
$categories = $pdo
    ->query('SELECT c.*, pc.post_id
             FROM post_category pc
             JOIN category c ON c.id = pc.category_id
             WHERE pc.post_id IN (' . implode(',', $ids) . ')'
            )->fetchAll(PDO::FETCH_CLASS, Category::class);
$link = $router->url('home');


?>

<h1>Mon blog</h1>

<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>