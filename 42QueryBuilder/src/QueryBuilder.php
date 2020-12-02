<?php
namespace App;

class QueryBuilder {

    private $from;

    private $order = [];

    private $limit;

    private $offset;

    private $where;

    private $field = [*];

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

    public function where (string $where): self
    {
        $this->where = $where;
        return $this;
    }

    public function setParam (string $key, $value): self
    {
        return $this;
    }

    public function select (...$fields): self
    {
        if(is_array($fields[0])) {
            $fields = $fields[0];
        }
        if ($this->fields === ['*']) {
            $this->fields = $fields;
        } else {
            $this->fields = array_merge($this->fields, $fields);
        }
        return $this;
    }

    public function toSQL(): string
    {
        $field = implode(', ', $this->fields);
        $sql = "SELECT $field FROM {$this->from}";
        if ($this->where) {
            $sql .= " WHERE " . $this->where;
        }
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