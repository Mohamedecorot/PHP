<?php
namespace App;

class QueryBuilder {

    private $from;

    private $order = [];

    private $limit;

    private $offset;

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

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }


    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function page (int $page): self
    {
        return $this->offset($this->limit * ($page - 1));
    }

    public function toSQL(): string
    {
        $sql = "SELECT * FROM {$this->from}";
        if (!empty($this->order)) {
            $sql .= " ORDER BY " . implode(', ', $this->order);
        }
        if ($this->limit > 0) {
            $sql .= " LIMIT " . $this->limit;
        }
        if ($this->offset !== null > 0) {
            $sql .= " OFFSET " . $this->offset;
        }
        return $sql;
    }
}