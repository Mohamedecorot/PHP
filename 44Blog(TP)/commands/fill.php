<?php
$pdo = new PDO('mysql:dbname=tutoblog;host=127.0.0.1', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
//on vide les tables
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

for ($i = 0; $i < 50; $i++) {
    $pdo->exec("INSERT INTO post SET name='Article #$i', slug='article-$i', created_at='2020-12-05 11:15:00', content='lorem ipsim'");
}
