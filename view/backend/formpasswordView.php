<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:29
 */
$title='Changement mot de passe';

ob_start();
?>
    <p>Veuillez renseigner votre nouveau mot de passe</p>
    <form action="index.php?pwsubmitted" method="post">
        <label>Nouveau mot de passe : </label><input type="password" name="password">
        <input type="submit" value="Sauvegarder">
    </form><br>
    <a href="index.php?dashboard">Revenir au tableau de bord</a>
<?php
$content=ob_get_clean();
require('view/template.php');
?>