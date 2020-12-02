<?php
namespace App;

class QueryBuilder {

    private $from;

    private $order = [];


    public function from (string $table, string $alias = null): self
    {
        $this->from = $alias === null ? $table : "$table $alias";
        return $this;
    }

    public function orderBy (string $key, string $direction): self
    {
        $direction = strtoupper($direction);
        if (!in_array($direction, ['ASC', 'DESC'])) {
            $this->order[] = $key;
        } else {
            $this->order[] ="$key $direction";
        }
        return $this;
    }

    public function toSQL(): string
    {
        $sql = "SELECT * FROM {$this->from}";
        if (!empty($this->order)) {
            $sql .= " ORDER BY " . implode(', ', $this->order);
        }
    }
}