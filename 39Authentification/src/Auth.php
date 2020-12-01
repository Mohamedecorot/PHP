<?php
namespace App;

use App\Exception\ForbiddenException;
use PDO;

class Auth {

    private $pdo;

    private $loginPath;

    private $session;

    public function __construct(\PDO $pdo, string $loginPath, array &$session)
    {
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
        $this->session = &$session;
    }

    public function user(): ?User
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['auth'] ?? null;
        if ($id === null) {
            return null;
        }
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetchObject(User::class);
        return $user ?: null;
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
            $this->session['auth'] = $user->id;
            return $user;
        }
        return null;
    }

    public function requireRole(string ...$roles): void
    {
        $user = $this->user();
        if ($user === null) {
            throw new ForbiddenException("Vous devez être connecté pour voir cette page");
        }
        if (!in_array($user->role, $roles)) {
            $roles = implode(',', $roles);
            $role = $user->role;
            throw new ForbiddenException("Vous n'avez pas le rôle suffisant \"$role\" (attendu : !=$roles)");
        }
    }

}