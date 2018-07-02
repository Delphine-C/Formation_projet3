<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 13:41
 */

$title='Connexion';

ob_start(); ?>
    <header>
        <h2>Connexion à l'espace administrateur</h2>
    </header>

    <div class="container">
        <form action="connexion" method="post" class="col-lg-4 col-lg-push-4">
            Utilisateur <input type="text" name="username" class="form-control"><br>
            Mot de passe <input type="password" name="password" class="form-control"><br>
            <input type="submit" value="Connexion">
        </form>
    </div>
<?php
$content=ob_get_clean();
require('view/template.php');
?>