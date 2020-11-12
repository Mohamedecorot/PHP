<?php
function nav_item (string $lien, string $titre, string $linkClass=''): string
{
    $classe = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . ' active';
    }
    return <<<HTML
    <li class="$classe">
        <a class="$linkClass" href="$lien">$titre</a>
    </li>
HTML;
/*
<li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php'): ?>active<?php endif ?>">
<a class="nav-link" href="/index.php">Accueil</a>
</li>
*/
}

function nav_menu(string $linkClass=''): string
{
    return
        nav_item('/index.php', 'Accueil', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass);
}
