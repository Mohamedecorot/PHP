<?php

use App\Auth;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase {

    /**
     * @var Auth
     */
    private $auth;

    private $session = [];

    /**
     * @before
     */
    public function setAuth ()
    {
        $pdo = new PDO("sqlite:memory", null, null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $pdo->query('CREATE TABLE users (id INTEGER, username TEXT, password TEXT)');
        for ($i = 1; $i <= 10; $i++) {
            $password = password_hash("user$i", PASSWORD_BCRYPT, ['cost' => 10]);
            $pdo->query("INSERT INTO users (id, username, password) VALUES ($i, 'user$i', '$password");
        }
        $this ->auth = new Auth($pdo, "/login", $this->session);
    }

    public function testLoginWithBadUsername()
    {
        $this->assertNull($this->auth->login('aze', 'aze'));
    }

    public function testLoginWithBadPassword()
    {
        $this->assertNull($this->auth->login('user1', 'aze'));
    }

    public function testLogininSuccess()
    {
        $this->assertObjectHasAttribute("username", $this->auth->login('user1', 'user1'));
        $this->assertEquals(1, $this->session['auth']);
    }
}