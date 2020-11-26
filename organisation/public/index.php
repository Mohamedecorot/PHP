<?php
require '../vendor/autoload.php';
require '../elements/header.php';
$uri = $_SERVER['REQUEST_URI'];
if($uri === '/nous-contacter') {
    require '../templates/contact.php';
} elseif ($uri === '/') {
    require '../templates/home.php';
} else {
    echo 404;
}

require '../elements/footer.php'

?>
