<?php
$title = "Nous contacter";

require 'elements/header.php';
require_once 'data/config.php';
require_once 'functions.php';

date_default_timezone_set('Europe/Paris');
$heure= (int)($GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = 'green';
if ($ouvert) { $color = 'green'; } else { $color = 'red'; }
//meme condition en ternaire: $color = $ouvert ? 'green' : 'red';
?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae impedit deleniti quo consectetur nobis consequuntur, nisi nulla autem expedita laboriosam ratione molestias obcaecati ea. Aspernatur, doloribus. Doloremque quasi facere totam.</p>
    </div>
    <div class="col-md-4">
        <h2>Horaires d'ouvertures</h2>

        <?php if($ouvert): ?>
        <div class="alert alert-success">
            Le magasin sera ouvert
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            Le magasin sera fermé
        </div>
        <?php endif ?>

        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasion sera ouvert</button>
        </form>

        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li <?php if ($k + 1 === (int)date('N')): ?> style="color:<?= $color ?>" <?php endif ?>>
                    <strong><?= $jour; ?></strong> :
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require 'elements/footer.php'; ?>
