<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:01
 */
$title='Chapitres disponibles';

ob_start(); ?>

    <h1>Voici les chapitres disponibles :</h1>

<?php

while($chapter=$listChapters->fetch())
{
    echo '<a href="?chapter=' . $chapter['id'] . '">Chapitre n° ' . $chapter['num'] . ' - ' . $chapter['title'] . ', publié le ' . $chapter['datepost_fr'] . ' par ' . $chapter['author'] . '</a><br/><br>';

}

$content=ob_get_clean();
require('view/template.php');
?>