<?php
namespace App\Table;

use \PDO;
use App\model\Category;
use App\Table\Exception\NotFoundException;

class CategoryTable extends Table {

    public function find (int $id): Category
    {
        $query = $this->pdo->prepare('SELECT * FROM category WHERE id = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Category::class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException('category', $id);
        }
        return $result;
    }
}