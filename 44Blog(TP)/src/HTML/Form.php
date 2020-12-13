<?php
namespace App\HTML;

class Form {

    private $data;
    private $errors;


    public function __construct ($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
            <div class="form-group">
                <label for="fields{key}">{$label}</label>
                <input type="text" id="fields{key}"  class="form-control" name="{$key}" value="{$value}" required>
            </div>
HTML;
    }

    public function textarea (string $name, string $label): string
    {
        return '';
    }

    private function getValue (string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'get' . ucfirst($key);
        return $this->data->$method();
    }

}