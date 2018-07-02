<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:11
 */
$title='Chapitres à modifier';

ob_start(); ?>
<header>
    <h2>Chapitres existants</h2>
</header>

<table class="table">
<?php
while($chapter=$listChapters->fetch())
{
    echo '<tr><td>Chapitre n° '. $chapter['num'] .' - '. $chapter['title'] .'</td><td><a href="index.php?updateChapter=' . $chapter['id'] . '">Modifier ce chapitre</a> ou <a href="index.php?deleteChapter=' . $chapter['id'] . '">Supprimer ce chapitre</a></td></tr>';
}
?>
</table>

<?php
$content=ob_get_clean();
require('view/template.php');
?>