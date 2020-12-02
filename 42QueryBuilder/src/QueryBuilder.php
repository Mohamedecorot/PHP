<?php
namespace App;

class QueryBuilder {

    private $from;

    public function from (string $table, string $alias): self
    {
        $this->from ="$table $alias";
        return $this;
    }

    public function toSQL(): string
    {
    return "SELECT * FROM {$this->from}";
    }
}