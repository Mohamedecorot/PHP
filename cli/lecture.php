<?php

$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';

//lecture
//echo file_get_contents($fichier);

$resource = fopen($fichier, 'r+');
$k = 0;
while ($line = fgets($resource)) {
    $k++;
    if ($k == 1) {
        echo $line;
        fwrite($resource, 'salut les gens');
    break;
    }
}
fclose($resource);
