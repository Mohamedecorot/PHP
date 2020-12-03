<?php

use App\QueryBuilder;
use App\URLHelper;
use App\TableHelper;
use App\Table;

define('PER_PAGE', 20);

require '../vendor/autoload.php';
require '../src/QueryBuilder.php';
$pdo = new PDO("sqlite:../products.db", null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$query = (new QueryBuilder($pdo))->from('products');

//Recherche par ville
if (!empty($_GET['q'])) {
    $query
        ->where('city LIKE :city')
        ->setParam('city', '%' . $_GET['q'] . '%');

}

$table = (new Table($query, $_GET))
    ->sortable('id', 'city', 'price')
    ->format('price', function ($value) {
    return number_format($value, 0, '', ' ') . ' ' . "€";
    })
    ->Columns([
        'id' => 'ID',
        'name' => 'Nom',
        'city' => 'Ville',
        'price' => 'Prix'
    ]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Biens immobiliers</title>
</head>
<body class="p-4">

    <h1>Les biens immobiliers</h1>

    <form action="" class="mb-4">
        <div class="form-group">
            <input type="text" class="form-control" name="q" placeholder="Rechercher par ville" value="<?= htmlentities($_GET['q'] ?? null)  ?>">
        </div>
        <button class="btn btn-primary">Rechercher</button>
    </form>

    <?php $table->render() ?>

</body>
</html>