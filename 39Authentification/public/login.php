<?php

use App\Auth;

require '../vendor/autoload.php';

if (!empty($_POST)) {
    $pdo = new PDO("sqlite:../data.sqlite", null, null, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $auth = new Auth($pdo);
    $user = $auth->login($_POST['username'], $_POST['password']);
    dd($user);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="p-4">
    <h1>Se connecter</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name ="username" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name ="password" placeholder="Mot de passe">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
</body>
</html>