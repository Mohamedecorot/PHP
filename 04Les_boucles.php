<?php
$chiffre = null;

while ($chiffre !== 10) {
    $chiffre = (int)readline('Entre un chiffre :');
}
echo 'Bravo vous avez gagné';

for ($i = 0; $i < 10; $i++) {
    echo "- $i \n";
}

$notes = [10, 15, 16];

foreach ($notes as $note) {
    echo "- $note \n";
}

$eleves = [
    'cm2' => 'Jean',
    'cm1' => 'Marc'
];

foreach ($eleves as $classe => $eleve) {
    echo "$eleve est dans la classe $classe \n";
}

$eleves2 = [
    'cm2' => ['Jean', 'Marc', 'Jane', 'Marion'],
    'cm1' => ['Emilie', 'Pierre', 'Virginie']
];

foreach ($eleves2 as $classe => $listEleves) {
    echo "La classe $classe est constitué de:\n";
    foreach ($listEleves as $eleve) {
        echo "- $eleve\n";
    }
    echo " ";
}

//exercice:

/*
Demandez à l'utilisateur de rentrer une note ou de taper "fin"
chaque note est sauvegardée dans un tableau *notes (penseez à notes[])
à la fin on affiche le tableau de note sous forme de liste
*/

$notes = [];
$action = null;

while ($action !== 'fin') {
    $action = readline('Entrer une nouvelle note (ou \'fin\ pour terminer la saisie)');
    if ($action !== 'fin') {
        $notes[] = (int)$action;
    }
}

foreach ($notes as $note) {
    echo "- $note \n";
}

echo "$notes";

/*
On veut demander à l'utilisateur de rentrer les horaires d'ouverture d'un magasin
On demande à l'utilisateur de rentrer une heure et on lui dira si le magasin est ouvert
*/

$crenaux = [];

while (true) {
    $debut = (int)readline('Heure d\'ouverture :');
    $fin = (int)readline('Heure de fermeture :');
    if ($debut >= $fin) {
        echo "Le créneaux ne peut pas être enregistré car l'heure d'ouverture' ($debut) est supérieur à l'heure de fin ($fin)";
    } else {
        $crenaux = [$debut, $fin];
        $action = readline ('Entrer un nouveau crénaux ? (n) : ');
        if ($action === 'n') {
            break;
        }
    }
}

/*
$heure = (int)readline("A quelle heure voulez-vous visiter le magasin ?");
$creneauTrouve = false;

foreach($crenaux as $creneau) {
    if($heure >= $crenaux[0] && $heure <= $crenaux[1]) {
    $creneauTrouve = true;
    break;
    }
}

if ($creneauTrouve) {
    echo 'Le magasin sera ouvert',
} else {
    echo 'Désolé, le magasin sera fermé';
}
*/

//Le magasin est ouvert de 9h a 12h et de 14h à 18h

echo 'Le magasin est ouvert de';
foreach ($crenaux as $k => $crenau) {
    if ($k > 0) {
        echo ' et de';
    }
    echo " {$crenau[0]}h à {$crenau[1]}h";
}