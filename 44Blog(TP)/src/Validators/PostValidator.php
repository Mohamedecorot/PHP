<?php
namespace App\Validators;

use App\Validator;
use App\Table\PostTable;

class PostValidator {

    private $data;
    private $validator;

    public function __construct(array $data, PostTable $table, ?int $postID = null)
    {
        $this->data = $data;
        $v = new Validator($data);
        $v->rule('required', ['name', 'slug']);
        $v->rule('lengthBetween', ['name', 'slug'], 3, 200);
        //$v->rule('slug', 'slug');
        $v->rule(function ($field, $value) use ($table, $postID) {
            return !$table->exists($field, $value, $postID);
        }, ['slug', 'name'], 'Cette valeur est déjà utilisée');
        $this->validator = $v;
    }

    public function validate (): bool
    {
        return $this->validator->validate();
    }

    public function errors (): array
    {
        return $this->validator->errors();
    }
}