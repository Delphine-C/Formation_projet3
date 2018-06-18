<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:10
 */

$title='Chapitre';

ob_start(); ?>

    <h1>Chapitre <?= $chapter->num() ?></h1>
    <h2><?= $chapter->title() ?></h2>
    <br>
    <p><?= $chapter->content() ?></p>

    <form action="index.php?newcomment=<?= $chapter->id() ?>" method="post">
        <label>Pseudo :</label><input type="text" name="pseudo"><br>
        <label>Votre commentaire</label><br>
        <textarea name="content"></textarea><br>
        <input type="submit" value="Publier">
    </form>

    <a href="index.php">Revenir à la liste des chapitres</a>

<? // ajouter en dessous du content les commentaires associés


$content=ob_get_clean();
require('view/template.php');
?>