<?php
$note = (int)readline('Entre votre note :');
if ($note > 10) {
    echo 'Bravo, vous avez la moyenne';
} elseif ($note === 10) {
    echo 'Vous avez juste la moyenne';
} else {
    echo 'Dommage, vous n\'avez pas la moyenne';
}

$action = (int)readline('Entrez votre action : (1:attaquer, 2: défendre, 3: passer mon tour');

switch ($action) {
    case 1:
        echo 'J`\'attaque';
        break;
    case 2:
        echo 'Je défend';
        break;
    case 3:
        echo 'Je ne fais rien';
        break;
    default:
        echo 'Commande inconnue';
}

/* Equivalent à :
    if ($action === 1) {
        echo 'J`\'attaque';
    } elseif ($action === 2) {
        echo 'Je défend';
    } elseif ($action === 3) {
        echo 'Je ne fais rien';
    } else {
        echo 'Commande inconnue';
    }
*/

$heure = (int)readline('Entre une heure :');

if ((9 <= $heure && $heure <= 12) || (14 <= $heure && $heure <= 17)) {
    echo 'Le magasin est ouvert';
} else {
    echo 'Le magasin est fermé';
}

/*
VRAI && VRAI = VRAI
VRAI && FAUX = VRAI
FAUX && FAUX = FAUX

VRAI || VRAI = VRAI
VRAI || FAUX = VRAI
FAUX || FAUX = FAUX
*/
