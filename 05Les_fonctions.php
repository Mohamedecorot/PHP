<?php
// Palindrome
$mot = readline('Veuillez entrer un mot: ');
$reverse = strtolower(strrev($mot));
if (strtolower($mot) === $reverse) {
    echo 'Ce mot est un palindrome';
} else {
    echo 'Ce mot n\'est un palindrome';
}

//fonction sur les tableaux

$notes = [10, 20, 13];
$somme = array_sum($notes);
$count = count($notes);
$moyenne = $sum / $count;
echo 'Vous avez' . round($moyenne). 'de moyenne';
array_push($notes, 16, 17);
$noteReversed = array_reverse($notes);


//filtre à insulte

/*$insultes = ['merde','con'];
$phrase = readline('Entrez une phrase : ');
foreach($insultes as $insulte) {
    $replace= str_repeat('*', strlen($insultes));
    $phrase = str_replace($insulte, $replace, $phrase);
}
echo $phrase;
*/

$insultes = ['merde','con'];
$asterisque = [];
foreach($insultes as $insulte) {
    $lettre = substr($insulte, 0, 1);
    $asterisque = $lettre . str_repeat('*', strlen($insulte) - 1);
}
$phrase = readline('Entrez une phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);
echo $phrase;
