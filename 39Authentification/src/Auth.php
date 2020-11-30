<?php
namespace App;

use PDO;

class Auth {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user(): ?User
    {

    }

    public function login(string $username, string $password): ?User
    {
        // Trouver l'utilisateur correspondant au username
        $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute(['username' => $username]);
        //$query->setFetchMode(PDO::FETCH_CLASS, User::class);
        //$user = $query->fetch();
        $user = $query->fetchObject(User::class);
        if ($user === false) {
            return null;
        }
        // On vérifie password_verify que l'utilsateur corresponde
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

}