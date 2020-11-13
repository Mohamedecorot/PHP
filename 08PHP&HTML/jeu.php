<?php
$title = "Déviner le chiffre";
require 'header.php';
$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $aDeviner) {
        $erreur = "Votre chiffre est trop grand";
    } elseif ($value < $aDeviner) {
        $erreur = "Votre chiffre est trop petit";
    } else {
        $succes = "Bravo ! Vous avez deviné le chiffre <strong>$aDeviner</strong>";
    }
}
?>

<form action="/jeu.php" method="POST">
<div class="form-group">
    <input type="number" class="form-control" name="chiffre" placeholder="Entre 0 et 1000" value="<?= $value ?>">
</div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>

<?php if ($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
    <?php elseif ($succes): ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>

<?php require 'footer.php'; ?>

<?php //pour lancer php avec les erreurs indiquées : php -S localhost:8000 -d error_reporting=E_ALL ?>
