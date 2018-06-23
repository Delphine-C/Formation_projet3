<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:11
 */
$title='Chapitres à modifier';

ob_start(); ?>

    <h1>Voici les chapitres existantss :</h1>

<?php

while($chapter=$listChapters->fetch())
{
    echo 'Chapitre n° '. $chapter['num'] .' - '. $chapter['title'] .' <a href="index?updateChapter=' . $chapter['id'] . '">Modifier ce chapitre</a> ou <a href="index?deleteChapter=' . $chapter['id'] . '">Supprimer ce chapitre</a><br/>';
}
?>
    <br>
    <a href="index.php?dashboard">Revenir au tableau de bord</a>
<?php
$content=ob_get_clean();
require('view/template.php');
?>