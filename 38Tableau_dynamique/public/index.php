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
$sortable = ["id", "name", "city", "price", "address"];

//Recherche par ville
if (!empty($_GET['q'])) {
    $query
        ->where('city LIKE :city')
        ->setParam('city', '%' . $_GET['q'] . '%');

}

$count = (clone $query)->count();

//Organisation
if (!empty($_GET['sort']) && in_array($_GET['sort'], $sortable)) {
    $query->orderBy($_GET['sort'], $_GET['dir'] ?? 'asc');
}


//Pagination
$query
    ->limit(PER_PAGE)
    ->page($_GET['p'] ?? 1);
$products = $query->fetchAll();
$table = new Table($query, $_GET);
$table->sortable('id', 'ville');
$table->setColumns([
    'id' => 'ID',
    'name' => 'Nom',
    'city' => 'Ville'
]);


//pour connaitre le nombre de page
$pages = ceil($count/ PER_PAGE);

//pour trier les labels par ordre croissant ou descroissant
function sortir(string $sortKey, string $label, array $data): string {
    $sort = $data['sort'] ?? null;
    $direction = $data['dir'] ?? null;
    $icon= "";
    if ($sort === $sortKey) {
        $icon = $direction === 'asc' ? "^" : "v";
    }
    $url = http_build_query(array_merge($data, [
        'sort' => $sortKey,
        'dir' => $direction === 'asc' && $sort === $sortKey ? 'desc' : 'asc'
        ]));
        return <<<HTML
        <a href="?$url">$label $icon</a>
HTML;
}


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

    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= sortir('id', 'ID', $_GET) ?></th>
                <th><?= sortir('name', 'Nom', $_GET) ?></th>
                <th><?= sortir('price', 'Prix', $_GET) ?></th>
                <th><?= sortir('city', 'Ville', $_GET) ?></th>
                <th><?= sortir('address', 'Adresse', $_GET) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
                <td>#<?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= number_format($product['price'], 0, '', ' ') //NumberHelper::price($product['price'])?> €</td>
                <td><?= $product['city'] ?></td>
                <td><?= $product['address'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>


<?php if ($pages > 1 && $page > 1): ?>
    <a href="?<?= http_build_query(array_merge($_GET, ["p" => $page - 1])) ?>" class="btn btn-primary">Page précédente</a>
<?php endif ?>

<?php if ($pages > 1 && $page < $pages): ?>
    <a href="?<?= http_build_query(array_merge($_GET, ["p" => $page + 1])) ?>" class="btn btn-primary">Page suivante</a>
<?php endif ?>

</body>
</html>