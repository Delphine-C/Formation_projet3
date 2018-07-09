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

<div class="container">
    <form action="envoi-mail" method="post" class="col-lg-6 col-lg-push-3">
        Nom <input type="text" name="name" class="form-control" required><br>
        Prénom <input type="text" name="firstname" class="form-control" required><br>
        Mail <input type="text" name="mail" class="form-control" required><br>
        Objet <input type="text" name="title" class="form-control" required><br>
        <label>Votre message</label><br>
        <textarea name="message" cols="50" rows="5" class="form-control" required></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>
</div>
<?php
$content=ob_get_clean();
require('view/template.php');
?>