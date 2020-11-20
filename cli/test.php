<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Creneau.php';
// instanciation: $creneau est une instance de la class Creneau();
$creneau = new Creneau(9, 12);
//$creneau->debut = 9;
//$creneau->fin = 12;
$creneau2 = new Creneau(14, 16);
$creneau->intersect($creneau2);

echo $creneau->toHTML();
var_dump(
    $creneau->inclusHeure(10),
    $creneau2->inclusHeure(10),
    $creneau->intersect($creneau2)
);