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
$title='Chapitre '.$chapter->num().' - '.$chapter->title().'';

$siteKey = '6Lf1aGAUAAAAAAc6Md8lde8nRRWQFYCyOlzKrhZw'; // votre clé publique


ob_start(); ?>
<header>
    <h2>Chapitre <?= $chapter->num() ?></h2>
    <h2><?= $chapter->title() ?></h2>
</header>

<div id="one-chapter">
    <section id="chapter">
        <?= $chapter->content() ?>
    </section>

    <section>
        <h2 class="com">Commentaires</h2><br>
    <?php
    if($listComments->rowcount() == 0){
        echo 'Aucun commentaire pour l\'instant. Soyez le premier à laisser un commentaire !<br>';
    }
    else{
            while ($comment=$listComments->fetch())
            {
                $content[]=$comment['id'];
                ?>
                <p>
                    <strong><?= htmlspecialchars($comment['author']) ?></strong> <a href="commentaire-signale.<?= $comment['id'] ?>">Signaler le commentaire</a>
                    <br>
                    Posté le <?= $comment['datepost_fr'] ?>
                    <br>
                    <?= htmlspecialchars($comment['content']) ?>
                </p>
                <?php
            }
        }
    ?>
<br>
        <h2 class="com">Laisser un commentaire</h2><br>
        <form action="nouveau-commentaire.<?= $chapter->id() ?>" method="post" class="form-comment">
            <label>Pseudo </label><input type="text" name="pseudo" placeholder="15 caractères max." class="form-control" required><br>
            <label>Votre commentaire</label><br>
            <textarea name="content" class="form-control" required></textarea><br><br>
            <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div><br>
            <input type="submit" value="Publier">
        </form>
    </section>
</div>
<?
$content=ob_get_clean();
require('view/template.php');
?>