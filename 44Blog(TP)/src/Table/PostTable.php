<?php
namespace App\Table;

use PDO;
use App\Model\Post;
use App\Table\Table;
use App\model\Category;
use App\PaginatedQuery;

class PostTable extends Table {

    public function findPaginated ()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM post ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM post",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        $postsByID = [];
        foreach ($posts as $post) {
            $postsByID[$post->getID()] = $post;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, pc.post_id
                    FROM post_category pc
                    JOIN category c ON c.id = pc.category_id
                    WHERE pc.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
                    )->fetchAll(PDO::FETCH_CLASS, Category::class);

        foreach ($categories as $category) {
            $postsByID[$category->getPostID()]->addCategory($category);
        }
        return [$posts, $paginatedQuery];
    }

}