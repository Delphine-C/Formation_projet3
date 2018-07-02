<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:00
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
$title='Nouveau chapitre';

ob_start(); ?>

    <form action="nouveau-chapitre-enregistre" method="post" class="form-admin">
        <label>Numéro de chapitre</label><input type="text" name="num" class="form-control"><br>
        <label>Titre du chapitre</label><input type="text" name="title" class="form-control"><br>
        <label>Votre chapitre</label><textarea name="chapter" class="onlyarea form-control"></textarea><br>
        <input type="submit" value="Publier">
    </form>

<?
$content=ob_get_clean();
require('view/template.php');
?>