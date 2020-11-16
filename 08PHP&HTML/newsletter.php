<?php
require_once 'functions.php';

$error = null;
$success = null;
$email = "";

if (!empty($_POST['email'])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' .DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email .PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    } else {
        $error = "Email invalide";
    }
}

$title = "Newsletter";
require 'elements/header.php';
?>

<h1 style="text-align: center;">S'inscrire à la newsletter</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam veritatis in quaerat impedit vel ipsum inventore recusandae illum, pariatur distinctio. Exercitationem expedita non nisi, earum quisquam impedit nemo ad temporibus!</p>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>

<form action="/newsletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrer votre email" required class="form-control" value="<?= htmlentities($email) ?>">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php require 'elements/footer.php'; ?>