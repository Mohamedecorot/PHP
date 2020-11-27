<h1>homepage</h1>

<a href="<?= $router->generate('contact') ?>">Nous contacter</a>
<a href="<?= $router->generate('article', ['id' => 60, 'slug' =>'mon-super-voyage']) ?>">Voir l'article</a>


<?php ob_start(); ?>
<script>alert('salut')</script>
<?php $pageJavascripts=ob_get_clean(); ?>