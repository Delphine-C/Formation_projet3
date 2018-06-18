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

    <a href="index.php">Revenir à la liste des chapitres</a>

<? // ajouter en dessous du content les commentaires associés
$content=ob_get_clean();
require('view/template.php');
?>