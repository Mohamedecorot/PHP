<?php
$notes = [10, 20, 15, 9, 8];
echo $notes[1];

$eleve = [
    'nom'    => 'Doe',
    'prenom' => 'Marc',
    'notes'  => [10, 20, 15]
];
//pour reaffecter une valeur dans un tableau
$eleve['prenom'] = 'Jean';
//pour ajouter une valeur dans un tableau
$eleve['notes'][3] = 16;
//pour avoir des infos sur un tableau
print_r($eleve['notes']);
echo $eleve['prenom']. ' '.$eleve['nom'];
