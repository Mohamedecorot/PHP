<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Model\Category;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

Auth::check();

$errors = [];
$item = new Category();

if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $success = false;
    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name', 'content']);
    if ($v->validate()) {
        $table->create($item);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);
?>


<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
    La catégorie n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>

<h1>Créer une catégorie</h1>

<?php require ('_form.php') ?>