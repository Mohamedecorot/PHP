<?php
// $mafunction = function ($nom) {
//     return 'Salut' . $nom;
// };

// echo $mafunction('Momo');

// $eleves = [
//     [
//         'nom' => 'Anne',
//         'Age' => 18,
//         'moyenne' => 15

//     ],
//     [
//         'nom' => 'Marc',
//         'Age' => 21,
//         'moyenne' => 13

//     ],
//     [
//         'nom' => 'Jean',
//         'Age' => 20,
//         'moyenne' => 18

//     ],
// ];

// $key = 'age';
// $sortAge = function ($eleve1, $eleve2) use ($key) {
//     return $eleve1[$key] - $eleve2[$key];
// };
// usort($eleves, $sort);


// on peut faire comme ça également:

// function sortByKey($key) {
//     return function ($eleve1, $eleve2) use ($key) {
//         return $eleve1[$key] - $eleve2[$key];
//     };
// }

// usort($eleves, sortByKey('moyenne'));

// var_dump($eleves);

// ou encore mieux

// function sortByKey(array $array, string $key) {
//     usort($array, function ($a, $b) use ($key) {
//         return $a[$key] - $b[$key];
//     });
//     return $array;
// }

// $elevesSorted = sortByKey($eleves, 'age');
// var_dump($elevesSorted);

class Demo {

    private $eleves = [
            [
                'nom' => 'Anne',
                'Age' => 18,
                'moyenne' => 15

            ],
            [
                'nom' => 'Marc',
                'Age' => 21,
                'moyenne' => 13

            ],
            [
                'nom' => 'Jean',
                'Age' => 20,
                'moyenne' => 8

            ],
        ];

        private function filterFonction ($eleve) {
            return $eleve['moyenne'] > 10;
        }

        public function bonEleves () {
            return array_filter($this->eleves, [$this, 'filterFonction']);
        }
}

$demo = new Demo;
var_dump($demo->bonEleves());