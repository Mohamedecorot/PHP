<?php
session_start();
//$_SESSION['role'] = 'administrateur';
//unset($_SESSION['role']);
$_SESSION['user'] = [
  'username' => 'John',
  'password' => '0000'
];
//php -S localhost:8000 Pour lancer en local un serveur à partir d'un fichier php
$title = "Page d'accueil";

require 'elements/header.php';

?>

<div class="starter-template">
  <h1>Bootstrap starter template</h1>
  <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
</div>

<?php require 'elements/footer.php'; ?>
