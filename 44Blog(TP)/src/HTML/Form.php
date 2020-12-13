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
        $inputClass = 'form-control';
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
            $invalidFeedback = '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return <<<HTML
            <div class="form-group">
                <label for="fields{key}">{$label}</label>
                <textarea type="text" id="fields{key}"  class="{$inputClass}" name="{$key}" required>{$value}"</textarea>
                {$invalidFeedback}
            </div>
HTML;
    }

    public function textarea (string $key, string $label): string
    {
        $value = $this->getValue($key);
        $inputClass = 'form-control';
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
            $invalidFeedback = '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return <<<HTML
            <div class="form-group">
                <label for="fields{key}">{$label}</label>
                <input type="text" id="fields{key}"  class="{$inputClass}" name="{$key}" value="{$value}" required>
                {$invalidFeedback}
            </div>
HTML;
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