<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

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
$pdo->exec("INSERT INTO post SET name='{$faker->sentence()}', slug='{$faker->slug}', created_at='{$faker->date} {$faker->time}', content='{$faker->paragraphs(rand(3,15), true)}'");
}
