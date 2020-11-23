<?php
require_once 'classes/OpenWeather.php';
$weather = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$forecast = $weather->getForecast('Marseille,fr');
$today = $weather->getToday('Marseille,fr');
//var_dump($forecast);
require 'elements/header.php';
?>

<div class="container">
    <ul>
        <li>En ce moment: <?= $today['description'] ?>, et il fait : <?= $today['temp'] ?>°C</li>
        <?php foreach($forecast as $day): ?>
            <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?><?= $day['temp'] ?>°C</li>
        <?php endforeach ?>
    </ul>
</div>

<?php require 'elements/footer.php';