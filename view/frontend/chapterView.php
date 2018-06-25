<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:10
 */
?>
    <head>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
<?php
$title='Chapitre';

$siteKey = '6Lf1aGAUAAAAAAc6Md8lde8nRRWQFYCyOlzKrhZw'; // votre clé publique


ob_start(); ?>

    <h1>Chapitre <?= $chapter->num() ?></h1>
    <h2><?= $chapter->title() ?></h2><br>
    <p><?= $chapter->content() ?></p>

<?php
    while($comment=$listComments->fetch())
    {
    echo '<p>'.$comment['author'].' <a href="index.php?report='.$comment['id'].'&amp;numchapter='.$chapter->id().'">Signaler le commentaire</a><br>Posté le'.$comment['datepost_fr'].'<br>'.$comment['content'].'</p>';

    }
?>

    <h2>Laisser un commentaire</h2>
    <form action="index.php?newcomment=<?= $chapter->id() ?>" method="post">
        <label>Pseudo :</label><input type="text" name="pseudo"><br>
        <label>Votre commentaire</label><br>
        <textarea name="content"></textarea><br><br>
        <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div><br>
        <input type="submit" value="Publier">
    </form>

    <a href="index.php">Revenir à la liste des chapitres</a>

<?
$content=ob_get_clean();
require('view/template.php');
?>