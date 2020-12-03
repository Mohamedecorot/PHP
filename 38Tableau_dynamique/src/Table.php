<?php
namespace App;

class Table {

    private $uery;

    private $get;

    private $sortable = [];

    private $columns = [];

    public function __construct(QueryBuilder $query, array $get)
    {
        $this->query = $query;
        $this->get = $get;
    }

    public function sortable(string ...$sortable) {
        $this->sortable = $sortable;
    }

    public function columns(array $columns) {
        $this->columns = $columns;
    }
}