<?php

include 'function.php';

var_dump(repondre_oui_non('test'));

/* On peut également utilisé require.
    La différence entre require et include, c'est que require demande obligatoire l'existence du fichier demandé
    Si celui-ci n'existe pas, le code va planté et ne pourra pas être excécuté. Le include donnera un warning, mais
    le reste du code s'excétura quand même.s

   Le require_once est intéressant si on inclu un fichier qui définit des fonctions, des classes, ou des choses particulières
   des choses qu'on ne veut pas voir redéfinit, par contre si on veut qu'un morceau de code soit réexcuter plusieurs fois,
   on utiilisera alors un require ou un include