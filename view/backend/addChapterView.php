<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:00
 */
$title='Nouveau chapitre';

ob_start(); ?>

    <form action="index.php?newChapter" method="post">
        <label>Numéro de chapitre</label><input type="text" name="num"><br>
        <label>Titre du chapitre</label><input type="text" name="title"><br>
        <label>Votre chapitre</label><textarea name="chapter"></textarea><br>
        <input type="submit" value="Publier">
    </form>


<?
$content=ob_get_clean();
require('view/template.php');
?>