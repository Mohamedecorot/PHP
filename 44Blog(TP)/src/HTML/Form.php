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
                <textarea type="text" id="fields{key}"  class="{$this->getInputClass($key)}" name="{$key}" required>{$value}"</textarea>
                {$this->getErrorFeedback($key)}
            </div>
HTML;
    }

    public function textarea (string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
            <div class="form-group">
                <label for="fields{key}">{$label}</label>
                <input type="text" id="fields{key}"  class="{$this->getInputClass($key)}" name="{$key}" value="{$value}" required>
                {$this->getErrorFeedback($key)}
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

    private function getInputClass (string $key): string
    {
        $inputClass = 'form-control';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getErrorFeedback (string $key): string
    {
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            return '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return '';
    }

}