
    </main><!-- /.container -->

<footer>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?php
                require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
                ajouter_vue();
                $vues = nombre_vues();
            ?>
            Il y a <?= $vues ?> visite<?php if ($vues > 1): ?>s<?php endif; ?> sur le site
        </div>
        <div class="col-md-4">
            <?php if($_SERVER['SCRIPT_NAME'] != "/newsletter.php"): ?>
                <form action="/newsletter.php" method="post" class="form-inline">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Entrer votre email" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            <?php endif ?>
        </div>
        <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?= nav_menu(); ?>
        </ul>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
