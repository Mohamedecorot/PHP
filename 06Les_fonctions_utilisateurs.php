<?php

$nom = 'Doe';

function bonjour ($prenom = null) {
    global $nom;
    if ($prenom === null) {
        return "Bonjour\n";
    }
    return 'Bonjour ' . $prenom. " " . $nom . "\n";
}

echo bonjour('Jean');

//exercice
// si l'utilisateur répond "o" => true
// si l'utilisateur répond "n" => false

function repondre_oui_non ($phrase) {
    while (true) {
        $reponse = readline($phrase . " - (o)ui/(n)non : ");
        if ($reponse ==="o") {
            return true;
        } elseif ($reponse === 'n') {
            return false;
        }
    }
}


function demander_creneau ($phrase = 'Veuillez entrer un creaneau') {
    echo $phrase . "\n";
    while (true) {
        $ouverture = (int)readline('Heure d\'ouverture : ');
        if ($ouverture >= 0 && $ouverture <= 23) {
        break;
        }
    }
    while (true) {
        $fermeture = (int)readline('Heure de fermeture : ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
        break;
        }
    }
    return [$ouverture, $fermeture];
}


function demander_creneaux ($phrase = "Veuillez entrer vos créneaux") {
    $creneaux = [];
    $continuer = true;
    while($continuer) {
        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non('Voulez-vous continuer ? ');
    }
    return $creneaux;
}

/*
Quelques notions spécifiques :

    1. Typage : il suffit de mettre le type juste devant la variable
        exemple: string $phrase = ....
        php convertira automatiquent (implicitement) ce qui est donné dans le type défini
        mais dans certains cas cela peut engendré une erreur
        Pour empecher php de faire la convertion, il faut mettre au début du fichier
        declare(strict_types=1);

    2. On peut également typer le retour, c'est-à-dire préciser ce que renvoie une fonction,
        pour faire cela, il suffit de mettre après les paramètres et la parenthèse :type_du_retour
        exemple: function test(param1, param2): array (string, int, float, string ...)

    3. Si un paramètre peut prendre une valeur nulle, lorsque l'on definit le type, on peut mettre un ? devant
        Exemple: ?string $phrase = null; cela signifie que $phrase peut être null ou contenir une chaine de caractère
