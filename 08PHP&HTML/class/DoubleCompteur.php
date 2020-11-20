<?php
/*
L'héritage permet de faire hériter à une classe toutes ce qu'a une autre classe
pour cela, on ajoute le terme extends après le nom de la nouvelle classe
suivi de la classe de qui elle doit hériter
Ceci est fortement utile, par exemple un niveau admin est similaire à un niveau utilisateur
avec des methodes en plus par exemple.
On peut donc rajouter des nouvelles méthodes mais également redéfinir des methodes deja existantes
*/

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Compteur.php';

class DoubleCompteur extends Compteur {

    public function recuperer(): int
    {
        return 2 * parent::recuperer();
    }
}