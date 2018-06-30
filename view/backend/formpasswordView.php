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
    <header>
    <h2>Veuillez renseigner votre nouveau mot de passe</h2>
    </header>
    <form action="index.php?pwsubmitted" method="post">
        <label>Nouveau mot de passe : </label> <input type="password" name="password">
        <input type="submit" value="Sauvegarder">
    </form><br>
<?php
$content=ob_get_clean();
require('view/template.php');
?>