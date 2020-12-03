<?php
namespace App;

class Table {

    private $query;

    private $get;

    private $sortable = [];

    private $columns = [];

    private $limit = 20;

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

    //pour trier les labels par ordre croissant ou descroissant
    public function th(string $sortKey): string {
        if (!in_array($sortKey, $this->sortable)) {
            return $this->columns[$sortKey];
        }
        $sort = $this->get['sort'] ?? null;
        $direction = $this->get['dir'] ?? null;
        $icon= "";
        if ($sort === $sortKey) {
            $icon = $direction === 'asc' ? "^" : "v";
        }
        $url = http_build_query(array_merge($this->get, [
            'sort' => $sortKey,
            'dir' => $direction === 'asc' && $sort === $sortKey ? 'desc' : 'asc'
            ]));
            return <<<HTML
            <a href="?$url">{$this->columns[$sortKey]} $icon</a>
HTML;
    }

    public function render()
    {
        $page = $this->get['p'] ?? 1;
        $count = (clone $this->query)->count();
        //organisation
        if (!empty($this->get['sort']) && in_array($this->get['sort'], $this->sortable)) {
            $this->query->orderBy($this->get['sort'], $this->get['dir'] ?? 'asc');
        }
        //Pagination
        $items = $this->query
            ->select(array_keys($this->columns))
            ->limit($this->limit)
            ->page($page)
            ->fetchAll();

        //pour connaitre le nombre de page
        $pages = ceil($count/ $this->limit);
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php foreach($this->columns as $key => $columns): ?>
                        <th><?= $this->th($key) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                    <?php foreach($this->columns as $key => $columns): ?>
                        <td><?= $item[$key] ?></td>
                    <?php endforeach ?>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php if ($pages > 1 && $page > 1): ?>
            <a href="?<?= http_build_query(array_merge($this->get, ["p" => $page - 1])) ?>" class="btn btn-primary">Page précédente</a>
        <?php endif ?>

        <?php if ($pages > 1 && $page < $pages): ?>
            <a href="?<?= http_build_query(array_merge($this->get, ["p" => $page + 1])) ?>" class="btn btn-primary">Page suivante</a>
        <?php endif ?>

    <?php
    }
}