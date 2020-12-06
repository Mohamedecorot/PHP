<?php
namespace App\Model;

use App\Helpers\Text;

class Post {

    private $id;

    private $name;

    private $content;

    private $created_at;

    private $categories = [];

    public function getName (): ?string
    {
        return $this->name;
    }

    public function getExcerpt (): ?string
    {
        if ($this->content === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 60)));
    }

}
