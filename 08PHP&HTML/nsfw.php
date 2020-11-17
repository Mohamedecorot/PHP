<?php

$age = null;

if (!empty($_GET['action']) && $_GET['action'] === 'reinitialisation') {
    unset($_COOKIE['birthday']);
    setcookie('birthday', '', time() - 10);
}

if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require 'elements/header.php';
?>

<?php if ($age >= 18): ?>
    <h1>Voilà le contenu réservé aux adultes</h1>
    <p>Vous avez <?= $age ?> ans</p>
    <a href="nsfw.php?action=reinitialisation">Réinitialiser</a>
<?php elseif ($age !== null): ?>
    <div class="alert alert-danger">Vous n'avez pas l'âge requis pour accéder au contenu, vous n'avez que <?= $age ?> ans</div>
    <a href="nsfw.php?action=reinitialisation">Réinitialiser</a>
<?php else: ?>
<form action="" method="post">
    <div class="form-group">
        <label for="birthday">Section réservée aux adultes, entrer votre année de naissance :</label>
        <select name="birthday" id="birthday" class="form-control">
            <?php for($i = (int)date('Y') - 10; $i > (int)date('Y') - 110; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<?php endif; ?>

<?php require 'elements/footer.php'; ?>