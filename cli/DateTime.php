<?php
$date1 = '2020-11-19';
$date2 = '2021-03-19';

$date = new DateTime();
$date->modify('+1 month');
echo $date->format('d/m/Y');
$d = new DateTime('$date1');
$d2 = new DateTime('$date2');
$diff = $d->diff($d2, true);
echo "Il y a {$diff->y} année, {$diff->m} mois et {$diff->days} jours de différence";

//autre manière

echo "\n";
$time = time();
$time = strtotime('+1 month', $time);
echo date('d/m/Y', $time);


$time1 = strtotime($date1);
$time2 = strtotime($date2);
$days = floor(abs(($time1 -$time2) / (24 * 60 *60)));
echo "Il y a $days jours de différence";