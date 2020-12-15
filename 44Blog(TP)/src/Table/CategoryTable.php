<?php
namespace App\Table;

use \PDO;
use App\model\Category;

final class CategoryTable extends Table {

    protected $table = "category";
    protected $class = Category::class;

    /**
     * @param App\Model\Post[] $posts
     */
    public function hydratePosts (array $posts): void
    {
        $postsByID = [];
        foreach ($posts as $post) {
            $postsByID[$post->getID()] = $post;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, pc.post_id
                    FROM post_category pc
                    JOIN category c ON c.id = pc.category_id
                    WHERE pc.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);

        foreach ($categories as $category) {
            $postsByID[$category->getPostID()]->addCategory($category);
        }
    }

    public function update (Post $post): void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, slug = :slug, created_at = :created, content = :content WHERE id = :id");
        $ok = $query->execute([
            'id' => $post->getID(),
            'name' => $post->getName(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'name' => $post->getName(),
            'created' => $post->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        if ($ok === false) {
            throw new \Exception("Impossible de modifier l'article $id dans la table {$this->table}");
        }
    }

    public function create (Post $post): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET name = :name, slug = :slug, created_at = :created, content = :content");
        $ok = $query->execute([
            'name' => $post->getName(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'name' => $post->getName(),
            'created' => $post->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        if ($ok === false) {
            throw new \Exception("Impossible de créer l'article  dans la table {$this->table}");
        }
        $post->setID($this->pdo->lastInsertId());
    }

    public function delete (int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $ok = $query->execute([$id]);
        if ($ok === false) {
            throw new \Exception("Impossible de supprimer l'article $id dans la table {$this->table}");
        }
    }

}