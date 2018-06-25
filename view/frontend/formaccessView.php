<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 13:41
 */

$title='Connexion';

ob_start(); ?>

    <h1>Connexion à l'espace administrateur</h1>

    <form action="index.php?testConnexion" method="post">
        Utilisateur <input type="text" name="username"><br>
        Mot de passe <input type="password" name="password"><br>
        <input type="submit" value="Connexion">
    </form>
    <br>
    <a href="index.php">Revenir à la liste des chapitres</a>
<?php
$content=ob_get_clean();
require('view/template.php');
?>