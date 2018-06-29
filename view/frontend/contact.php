<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 29/06/2018
 * Time: 10:09
 */
$title='Contact';

ob_start(); ?>
<header>
    <h2>Contactez-moi</h2>
</header>

    <form action="index.php?sendmessage" method="post">
        Nom <input type="text" name="name"><br>
        Prénom <input type="text" name="firstname"><br>
        Mail <input type="text" name="mail"><br>
        <label>Votre message</label><br>
        <textarea name="message"></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>
<?php
$content=ob_get_clean();
require('view/template.php');
?>