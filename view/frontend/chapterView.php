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
<header>
    <h2>Chapitre <?= $chapter->num() ?></h2>
    <h2><?= $chapter->title() ?></h2>
</header>

<section id="chapter">
    <?= $chapter->content() ?>
</section>


<?php
    while($comment=$listComments->fetch())
    {
    echo '<p>'.htmlspecialchars($comment['author']).' <a href="commentaire-signale-'.$comment['id'].'-'.$chapter->id().'">Signaler le commentaire</a><br>Posté le'.$comment['datepost_fr'].'<br>'.htmlspecialchars($comment['content']).'</p>';
    }
?>

    <h2>Laisser un commentaire</h2>
    <form action="nouveau-commentaire-<?= $chapter->id() ?>" method="post">
        <label>Pseudo :</label><input type="text" name="pseudo" placeholder="15 caractères max."><br>
        <label>Votre commentaire</label><br>
        <textarea name="content"></textarea><br><br>
        <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div><br>
        <input type="submit" value="Publier">
    </form>

    <a href="accueil">Revenir à la liste des chapitres</a>

<?
$content=ob_get_clean();
require('view/template.php');
?>