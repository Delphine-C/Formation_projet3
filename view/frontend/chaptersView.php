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

<section id="chapters">
<?php
while($chapter=$listChapters->fetch())
{
    echo '<h3><a href="chapitre.' . $chapter['id'] . '">Chapitre n° ' . $chapter['num'] . ' - ' . $chapter['title'] . ', publié le ' . $chapter['datepost_fr'] . ' par ' . $chapter['author'] . '</a></h3><br/><br>';

} ?>
</section>
<?php
$content=ob_get_clean();
require('view/template.php');
?>