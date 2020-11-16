<?php
//ecriture
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
file_put_contents($fichier, 'coucou', FILE_APPEND);
/*
__DIR__ : permet de trouver le chemin du dossier courant (quelque soit l'OS d'utilisation)
DIRECTORY_SEPARATOR : permet de mettre un séparateur adapté à l'OS utilisé
*/

$fichier2 = dirname(dirname(direname(direname(__DIR__)))) . DIRECTORY_SEPARATOR .'demo2.txt';
$size = @file_put_contents($fichier2, 'comment ça va ?');
if ($size === false) {
    echo 'Impossible d\'écrire dans le fichier';
} else {
    echo 'Ecriture réussie';
}

/*
dirname() : permet de remonter d'un cran dans le dossier actuel
@ avant une fonction, permet de masquer les erreurs, il faut tout de même penser à traiter les erreurs possible
*/
