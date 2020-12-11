<?php
namespace App\Table;

use PDO;
use App\Model\Post;
use App\Table\Table;
use App\model\Category;
use App\PaginatedQuery;
use App\Table\Exception\NotFoundException;

class PostTable extends Table {

    public function find (int $id): Post
    {
        $query = $this->pdo->prepare('SELECT * FROM post WHERE id = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException('post', $id);
        }
        return $result;
    }

    public function findPaginated ()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM post ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM post",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

    public function findPaginatedForCategory (int $categoryID)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT p.*
                FROM post p
                JOIN post_category pc ON pc.post_id = p.id
                WHERE pc.category_id = {$categoryID}
                ORDER BY created_at DESC",
            "SELECT COUNT(category_id) FROM post_category WHERE category_id = {$categoryID}"
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

}