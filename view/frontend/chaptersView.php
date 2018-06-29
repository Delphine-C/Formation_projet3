<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:01
 */
$title='Chapitres disponibles';

ob_start(); ?>
    <header>
        <h2>Tous les chapitres disponibles :</h2>
    </header>

<?php

while($chapter=$listChapters->fetch())
{
    echo '<a href="?chapter=' . $chapter['id'] . '">Chapitre n° ' . $chapter['num'] . ' - ' . $chapter['title'] . ', publié le ' . $chapter['datepost_fr'] . ' par ' . $chapter['author'] . '</a><br/><br>';

}

$content=ob_get_clean();
require('view/template.php');
?>