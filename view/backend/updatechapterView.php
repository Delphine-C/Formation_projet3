<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:13
 */
?>
    <head>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
            tinyMCE.init({
                selector:".onlyarea"
            });
        </script>
    </head>

<?php
$title='Modifier un chapitre';

ob_start(); ?>

    <form action="chapitre-modifie.<?= $chapter->id() ?>" method="post">
        <label>Numéro de chapitre</label><input type="text" name="num" value="<?= $chapter->num() ?>"><br>
        <label>Titre du chapitre</label><input type="text" name="title" value="<?= $chapter->title() ?>"><br>
        <label>Votre chapitre<br></label><textarea name="chapter" class="onlyarea"><?= $chapter->content() ?></textarea><br>
        <input type="submit" value="Modifier">
    </form>


<?
$content=ob_get_clean();
require('view/template.php');
?>