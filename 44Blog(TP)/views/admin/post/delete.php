<?php

use App\Connection;
use App\Table\PostTable;

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
//$table->delete($params['id']);
header('Location: ' . $router->url('admin_posts') . '?delete=1');
?>

<h1>Suppression de l'article <?= $params['id'] ?></h1>

