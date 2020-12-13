<?php
namespace App\Validators;

class PostValidator {

    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate (): bool
    {

    }

    public function errors (): array
    {

    }
}