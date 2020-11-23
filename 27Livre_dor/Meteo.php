<?php
require_once 'classes/OpenWeather.php';
$weather = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$error = null;
try {
    $forecast = $weather->getForecast('Marseille,fr');
    $today = $weather->getToday('Marseille,fr');
} catch (CurlException $e) {
    exit($e->getMessage());
} catch (HTTPException $e) {
    $error = $e->getCode() . ' : ' . $e->getMessage();
}
//var_dump($forecast);
require 'elements/header.php';
?>

<?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php else: ?>
    <div class="container">
        <ul>
            <li>En ce moment: <?= $today['description'] ?>, et il fait : <?= $today['temp'] ?>°C</li>
            <?php foreach($forecast as $day): ?>
                <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?><?= $day['temp'] ?>°C</li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php require 'elements/footer.php';