<?php
namespace App;

class QueryBuilder {

    private $from;

    private $order;


    public function from (string $table, string $alias): self
    {
        $this->from ="$table $alias";
        return $this;
    }

    public function orderBy (string $key, string $direction): self
    {
        $this->order ="$key $direction";
        return $this;
    }

    public function toSQL(): string
    {
        $sql = "SELECT * FROM {$this->from}";
        if ($this->order) {
            $sql .= " ORDER BY {$this->order}";
        }
    }
}